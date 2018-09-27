<?php

return [
    'alipay' => [
        'app_id'         => '2016092100565384',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAs3DPAZ9f2Kj77jbvY++e3Vy/J+KATAZlAhKNCO/oRIbSxLMPi+ItTyUDNkIroAv/5WEYJCKeoNV4V/sPkgxTLoUaFxmEsEXq/3gJUZzo4YjTs18IsSeM/BnAmS8bd5tQtrv415xt10yjxKr3h62k5AwlaYuGoDVNSY8FR/WgMMr24mPLjzVEvA+8KN2+o7buZAHGBLUZ3MwgMAkJa69ogKwlAp2U8RA2cll3UI6v2RFG5f5St7+hzpXOMOYrioH5cBJyb96BXV6WYnCZle1GWpOLmJPH2pcXpcI5fvt4YZkK/raV0WyctBxk/wr1o3oXf1IIVUG4cI1Q2/4Nrl/plwIDAQAB',
        'private_key'    => 'MIIEvwIBADANBgkqhkiG9w0BAQEFAASCBKkwggSlAgEAAoIBAQDA8eDLG38Ask2uFUyPG6KSKyJSGVdlbsDfA4roLI0DalBwzxtyAHbDvyYN9OncZEjr82AZa1WHa9AOp5vE++Il+L5oiCNespO94Awrh5VsUf+ZwnAkwp8pYW+wiCL6rq1/NrtliZC2haCKqGkAiXnhrxRnJU7JFIziVcHyxUZBkU7+wvdHxaBDzxQAItB4jJ1MCpiHp6Pq/0hvqyfNJfJyRbu2gmKGDxRopMD6vZFas9IH+Ruk1028cPXeBv6LRbFJX0RZ+FDp5GaglHrt3+jgj93Q7IJTDxm2E8g7nUYAjINNM3lS3Ns1NHPydhyRRSdXbwvVH5gqjvplSy2aKMoZAgMBAAECggEBAK2wD+BG3ElQOUVgvw6EnhBe7AJj9ZzF2rHnin/+uuI8LjWe+uHhMQh9ZlBiDLPtQwfEitnXGaNSlnTaxQrKhIYSKbYH928j6oOe0NXOs+BS4HkV48XzvTuPDvAnXPW1kVFXf9Kjx7XHDQJFIGDvYNycsw03NHknGrwU3wcgN2KFUAebq+OykUN9z/9EpV265TVAvBrLj3Si5+7CJR/shGLI8zC9TthPMKFOEiY3UXvkRBmRCUDso+68SzOBuMyToFMV1SgswOa9kJdGYRPcSNJs9COZOnrqwPnz7f4SGY2BOMAcD3EIzoasnwkVZPPQanhxNEsWr5kOuy3qAZ3KkZECgYEA4+xkjFEZAMZ7aluVgg/f02JVQIiTGSTHNnxbw1Ivtqd9BhFq+RJucOuiZPUYGILjDwTWjBmOnWXdB15NUNPPLNeSoolzqFd8fvJKRNaXhK5S19ispXGXkbQWnVSaFLYXJF9V6UJZ3t5G0tML+2KkigqAUfw4hu/V7771f3Dhbo8CgYEA2LZt9GHuOoyNkXWq6i26pPEPMhK63ZEdBnhcV2bEtl79lo0MuMRCgcdWhsV4hLf+B3XyhXfsK/VOwVG5lyjoPLsFBjd45y5iLhhPw5f/R8Dn9l0AZW2wjMKzc8JEXsA25I5Gv7AKLqAXl2mmKLW6rMeChMAn4msatYKksSFUENcCgYEAqcSXdEintgMhRCxpZVJLppjU5VeVMaJKXFQuyYK7FXMV1eI9ar6G0sdA07AXvZIobDRvVjVnG+gWxXlBX5YU99KuXzDAnEBl8+ym0zV/8I0kGbBDkIvWmOmp+pBcoFatUCNOy4rng/DOkhQvFZT49/UwdWDH/gJAuO3k0IMU9xMCgYBODh86d49rzTYsXzppUIE6aYz0lyRxK5RNwUpZPK27lik2caVUY3Qk9Fxo/HU1MGQx4byxcAlDp/5uyPXUySokvaPIonBMrDs2qREJvRR4jrW92a+L2N9PQ82I8z7W9dqPpeM7pbd1Jbp5kdcEMLiFBPMwx1lWRwd+uwiAuCVkTwKBgQCZEJfwKfE9ZI8zBDxF7iazUigwG4LctPfqUB4LvWcmdiI9sVL4tblLAIcYSpqkISPfnupNuqfb6UZFdtDnibS6zdUh0yp2W6dhvWrsvsSTfCSBZyqvxEawo1gz5VMimGKxdlIbcesH+vF25aaxOk9QrC8umqAdr+oOAE+JYwLurg==',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];