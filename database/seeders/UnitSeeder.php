<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('units')->delete();
        \DB::table('units')->insert(array(
            0 =>
            array(
                'id'=>1,
                'unit' => 'cm'
             
               
            ),
            1 =>
            array(
                'id'=>2,
                'unit' => 'm'
              
            ),
          
            2 =>
            array(
                'id'=>3,
                'unit' => 'gram'
              
            ),
            3 =>
            array(
                'id'=>4,
                'unit' => 'kg'
              
            ),
            4 =>
            array(
                'id'=>5,
                'unit' => 'pound'
              
            ),
            5 =>
            array(
                'id'=>6,
                'unit' => 'piece'
              
            ),
            6 =>
            array(
                'id'=>7,
                'unit' => 'dozen'
              
            ),
            7 =>
            array(
                'id'=>8,
                'unit' => 'tons'
              
            ),
            8 =>
            array(
                'id'=>9,
                'unit' => 'bags'
              
            ),
            9 =>
            array(
                'id'=>10,
                'unit' => 'mm'
              
            ),
        ));
    }
}
