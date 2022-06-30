<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('order_status')->delete();
        \DB::table('order_status')->insert(array(
            0 =>
            array(
                'id'=>1,
                'order_status' => 'Pending',
                'status'=>1
               
            ),
            1 =>
            array(
                'id'=>2,
                'order_status' => 'Completed',
                'status'=>1
            ),
            2 =>
            array(
                'id'=>3,
                'order_status' => 'Canceled',
                'status'=>1
            ),
            3 =>
            array(
                'id'=>4,
                'order_status' => 'Assign to Delivery',
                'status'=>1
            ),
            4 =>
            array(
                'id'=>5,
                'order_status' => 'Assign to Driver',
                'status'=>1
            ),
            5 =>
            array(
                'id'=>6,
                'order_status' => 'In transit',
                'status'=>1
            ),
        ));
    }
}
