<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class userAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user_address')->delete();
        \DB::table('user_address')->insert(array(
            0 =>
            array(
                'id'=>1,
                'address_1' => '5/4B,Ganguly street',
                'zipcode'=>700056,
                'state'=>'west bengal',
                'country'=>'india',
                'mobile'=>7458965842,
                'user_id'=>1
               
            ),
         
        ));

    }
}
