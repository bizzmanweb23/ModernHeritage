<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class JobPosition extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('job_positions')->delete();
        \DB::table('job_positions')->insert(array(
            0 =>
            array(
                'id'=>1,
                'position_name' => 'Driver',
                'dpt_id'=>4,
                'status' => 1,
             
               
            ),
            1 =>
            array(
                'id'=>2,
                'position_name' => 'Accountant',
                'dpt_id'=>5,
                'status' => 1,
              
            ),
          
            2 =>
            array(
                'id'=>3,
                'position_name' => 'Accounting officer',
                'dpt_id'=>5,
                'status' => 1,
              
            ),
            3 =>
            array(
                'id'=>4,
                'position_name' => 'Business analyst',
                'dpt_id'=>5,
                'status' =>1,
              
            ),
            4 =>
            array(
                'id'=>5,
                'position_name' => 'General accountant',
                'dpt_id'=>5,
                'status' =>1,
              
            ),
            5 =>
            array(
                'id'=>6,
                'position_name' => 'Project accountant',
                'dpt_id'=>5,
                'status' =>1,
              
            ),
        ));

    }
}
