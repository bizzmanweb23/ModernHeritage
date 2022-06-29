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
                'delivery_address'=>'behala,kolkata',
                'delivery_state'=>'west bengal',
                'delivery_country'=>'india',
                'delivery_zipcode'=>'745896',
                'order_status'=>1,
                'created_at'=>'2022-05-09 18:39:51'
            ),
            1 =>
            array(
                'id'=>2,
                'order_id' => 2,
                'customer_name'=>"Ritesh Tewari",
                'customer_email'=>"tewari@gmail.com",
                'customer_phone'=>6289654749,
                'customer_type'=>'individual',
                'order_status'=>1,
                'order_mode'=>'COD',
                'order_amount'=>100,
                'delivery_address'=>'shyambazar,kolkata',
                'delivery_state'=>'west bengal',
                'delivery_country'=>'india',
                'delivery_zipcode'=>'745856',
                'order_status'=>1,
                'created_at'=>'2022-05-10 16:39:51'
            ),
            2 =>
            array(
                'id'=>3,
                'order_id' => 3,
                'customer_name'=>"Mukesh Sahani",
                'customer_email'=>"mukesh@gmail.com",
                'customer_phone'=>6289654744,
                'customer_type'=>'individual',
                'order_status'=>1,
                'order_mode'=>'COD',
                'order_amount'=>10,
                'delivery_address'=>'salt lake,kolkata',
                'delivery_state'=>'west bengal',
                'delivery_country'=>'india',
                'delivery_zipcode'=>'746896',
                'order_status'=>1,
                'created_at'=>'2022-05-11 18:39:51'
            ),
           
        ));

    }
}
