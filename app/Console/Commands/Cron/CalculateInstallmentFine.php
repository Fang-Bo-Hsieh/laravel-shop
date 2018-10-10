<?php
namespace App\Console\Commands\Cron;

use App\Models\Installment;
use App\Models\InstallmentItem;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CalculateInstallmentFine extends Command
{
    protected $signature = 'cron:calculate-installment-fine';

    protected $description = '计算分期付款逾期费';

    public function handle()
    {
        // Eloquent 的延迟加载原理是：取出所有查到的还款计划的 installment_id 字段，去重之后使用类似 select * from installments where id in ($installment_id_list) 的语句进行查询，然后再组装到对应的还款计划对象上， 而 where in 能够接受的参数个数并不是无限多，具体多少个与 Mysql 的 max_allowed_packet 配置有关，假如返回的还款计划数量过多， installment_id_list 就会非常长，就会导致这个 SQL 执行失败，从而导致预加载失败；
        // 即使 max_allowed_packet 这配置比较大，where in 可以接受足够多的参数，但是返回回来的数据也会特别多，而是 PHP 是一个内存使用非常低效的语言(ref: http://www.ituring.com.cn/article/498349)，存储 1MB 的数据可能需要 3MB 内存甚至更多（有兴趣同学可以参考这篇文章），另外 PHP 的进程是有内存使用限制的，因此假如返回的数据量太多，PHP 的进程会因为内存占用过多而被杀死。
        InstallmentItem::query()
            // 预加载分期付款数据，避免 N + 1 问题
            ->with(['installment'])
            ->whereHas('installment', function ($query) {
                // 对应的分期状态为还款中
                $query->where('status', Installment::STATUS_REPAYING);
            })
            // 还款截止日期在当前时间之前
            ->where('due_date', '<=', Carbon::now())
            // 尚未还款
            ->whereNull('paid_at')
            // 使用 chunkById 避免一次性查询太多记录
            ->chunkById(1000, function ($items) {
                // 遍历查询出来的还款计划
                foreach ($items as $item) {
                    // 通过 Carbon 对象的 diffInDays 直接得到逾期天数
                    $overdueDays = Carbon::now()->diffInDays($item->due_date);
                    // 本金与手续费之和
                    $base = big_number($item->base)->add($item->fee)->getValue();
                    // 计算逾期费，在做这种高精度的计算时，应优先执行让结果绝对值变大的数（即先乘绝对值大的数或先除绝对值小的数）。
                    $fine = big_number($base)
                        ->multiply($overdueDays)
                        ->multiply($item->installment->fine_rate)
                        ->divide(100)
                        ->getValue();
                    // 避免逾期费高于本金与手续费之和，使用 compareTo 方法来判断
                    // 如果 $fine 大于 $base，则 compareTo 会返回 1，相等返回 0，小于返回 -1
                    $fine = big_number($fine)->compareTo($base) === 1 ? $base : $fine;
                    $item->update([
                        'fine' => $fine,
                    ]);
                }
            });
    }
}