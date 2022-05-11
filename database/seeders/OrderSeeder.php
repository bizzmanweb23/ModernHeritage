<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('orders')->delete();
        \DB::table('orders')->insert(array(
            0 =>
            array(
                'id'=>1,
                'order_id' => 1,
                'customer_name'=>"Bijay Kumar",
                'customer_email'=>"kumar@gmail.com",
                'customer_phone'=>6289654745,
                'customer_type'=>'individual',
                'order_status'=>1,
                'order_mode'=>'COD',
                'order_amount'=>550,
                'created_at'=>'2022-05-09 18:39:51'
            ),

           
        ));

    }
}
