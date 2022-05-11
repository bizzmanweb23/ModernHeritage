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
           
           
        ));
    }
}
