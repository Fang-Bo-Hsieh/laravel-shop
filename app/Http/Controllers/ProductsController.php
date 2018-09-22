<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    
    public function index(Request $request)
    {
    	// on_sale 字段为 true 的记录，这样未上架的商品就不会被展示出来。
        $products = Product::query()->where('on_sale', true)->paginate(16);

        return view('products.index', ['products' => $products]);
    }
}
