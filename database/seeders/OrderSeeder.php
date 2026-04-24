<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        // 1. Orders
        $orders = [
            ['id' => 1, 'user_id' => 1, 'status' => 'pending', 'total_amount' => 885.15],
            ['id' => 2, 'user_id' => 2, 'status' => 'pending', 'total_amount' => 612.28],
            ['id' => 3, 'user_id' => 3, 'status' => 'pending', 'total_amount' => 565.49],
            ['id' => 4, 'user_id' => 4, 'status' => 'pending', 'total_amount' => 803.75],
            ['id' => 5, 'user_id' => 5, 'status' => 'pending', 'total_amount' => 891.31],
            ['id' => 6, 'user_id' => 6, 'status' => 'pending', 'total_amount' => 825.87],
            ['id' => 7, 'user_id' => 7, 'status' => 'pending', 'total_amount' => 768.39],
            ['id' => 8, 'user_id' => 8, 'status' => 'pending', 'total_amount' => 296.3],
            ['id' => 9, 'user_id' => 9, 'status' => 'pending', 'total_amount' => 136.93],
            ['id' => 10, 'user_id' => 10, 'status' => 'pending', 'total_amount' => 132.02],
            ['id' => 11, 'user_id' => 11, 'status' => 'pending', 'total_amount' => 852.77],
            ['id' => 12, 'user_id' => 12, 'status' => 'pending', 'total_amount' => 113.89],
            ['id' => 13, 'user_id' => 13, 'status' => 'pending', 'total_amount' => 179.35],
            ['id' => 14, 'user_id' => 14, 'status' => 'pending', 'total_amount' => 558.63],
            ['id' => 15, 'user_id' => 15, 'status' => 'pending', 'total_amount' => 322.84],
            ['id' => 16, 'user_id' => 16, 'status' => 'pending', 'total_amount' => 504.15],
            ['id' => 17, 'user_id' => 17, 'status' => 'pending', 'total_amount' => 86.72],
            ['id' => 18, 'user_id' => 18, 'status' => 'pending', 'total_amount' => 948.85],
            ['id' => 19, 'user_id' => 19, 'status' => 'pending', 'total_amount' => 432.38],
            ['id' => 20, 'user_id' => 20, 'status' => 'pending', 'total_amount' => 962.26],
        ];

        $orders = array_map(function($o) {
            $o['created_at'] = '2026-04-16 10:16:41';
            $o['updated_at'] = '2026-04-16 10:16:41';
            return $o;
        }, $orders);

        DB::table('orders')->insert($orders);

        // 2. Order Items
        $orderItems = [
            ['id' => 1, 'order_id' => 1, 'product_id' => 17, 'quantity' => 2, 'price_per_unit' => 885.15],
            ['id' => 2, 'order_id' => 2, 'product_id' => 30, 'quantity' => 1, 'price_per_unit' => 612.28],
            ['id' => 3, 'order_id' => 3, 'product_id' => 46, 'quantity' => 3, 'price_per_unit' => 565.49],
            ['id' => 4, 'order_id' => 4, 'product_id' => 1, 'quantity' => 2, 'price_per_unit' => 803.75],
            ['id' => 5, 'order_id' => 5, 'product_id' => 13, 'quantity' => 1, 'price_per_unit' => 891.31],
            ['id' => 6, 'order_id' => 6, 'product_id' => 43, 'quantity' => 3, 'price_per_unit' => 825.87],
            ['id' => 7, 'order_id' => 7, 'product_id' => 45, 'quantity' => 2, 'price_per_unit' => 768.39],
            ['id' => 8, 'order_id' => 8, 'product_id' => 29, 'quantity' => 2, 'price_per_unit' => 296.3],
            ['id' => 9, 'order_id' => 9, 'product_id' => 37, 'quantity' => 3, 'price_per_unit' => 136.93],
            ['id' => 10, 'order_id' => 10, 'product_id' => 48, 'quantity' => 2, 'price_per_unit' => 132.02],
            ['id' => 11, 'order_id' => 11, 'product_id' => 14, 'quantity' => 3, 'price_per_unit' => 852.77],
            ['id' => 12, 'order_id' => 12, 'product_id' => 13, 'quantity' => 3, 'price_per_unit' => 113.89],
            ['id' => 13, 'order_id' => 13, 'product_id' => 10, 'quantity' => 3, 'price_per_unit' => 179.35],
            ['id' => 14, 'order_id' => 14, 'product_id' => 36, 'quantity' => 3, 'price_per_unit' => 558.63],
            ['id' => 15, 'order_id' => 15, 'product_id' => 36, 'quantity' => 1, 'price_per_unit' => 322.84],
            ['id' => 16, 'order_id' => 16, 'product_id' => 26, 'quantity' => 2, 'price_per_unit' => 504.15],
            ['id' => 17, 'order_id' => 17, 'product_id' => 44, 'quantity' => 2, 'price_per_unit' => 86.72],
            ['id' => 18, 'order_id' => 18, 'product_id' => 45, 'quantity' => 1, 'price_per_unit' => 948.85],
            ['id' => 19, 'order_id' => 19, 'product_id' => 48, 'quantity' => 3, 'price_per_unit' => 432.38],
            ['id' => 20, 'order_id' => 20, 'product_id' => 7, 'quantity' => 1, 'price_per_unit' => 962.26],
        ];

        $orderItems = array_map(function($oi) {
            $oi['created_at'] = '2026-04-16 10:16:41';
            return $oi;
        }, $orderItems);

        DB::table('order_items')->insert($orderItems);
    }
}