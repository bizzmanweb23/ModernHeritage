<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderProducts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_products')->delete();
        \DB::table('order_products')->insert(array(
            0 =>
            array(
                'id'=>1,
                'order_id' => 1,
                'product_id'=>"MHP00001",
                'product_name'=>"Chair",
                'product_quantity'=>5,
                'product_price'=>100,
              
            ),
            1 =>
            array(
                'id'=>2,
                'order_id' => 1,
                'product_id'=>"MHP00002",
                'product_name'=>"Pen",
                'product_quantity'=>5,
                'product_price'=>10,
              
            ),
            2 =>
            array(
                'id'=>3,
                'order_id' => 2,
                'product_id'=>"MHP00001",
                'product_name'=>"Chair",
                'product_quantity'=>5,
                'product_price'=>100,
              
            ),
            3 =>
            array(
                'id'=>4,
                'order_id' => 3,
                'product_id'=>"MHP00002",
                'product_name'=>"Pen",
                'product_quantity'=>5,
                'product_price'=>10,
              
            ),
        ));
    }
}
