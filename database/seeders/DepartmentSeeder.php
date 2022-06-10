<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('departments')->delete();
        \DB::table('departments')->insert(array(
            0 =>
            array(
                'id'=>1,
                'department_name' => 'Management',
                'status' => 1,
             
               
            ),
            1 =>
            array(
                'id'=>2,
                'department_name' => 'Administration',
                'status' => 1,
              
            ),
          
            2 =>
            array(
                'id'=>3,
                'department_name' => 'Sales',
                'status' => 1,
              
            ),
            3 =>
            array(
                'id'=>4,
                'department_name' => 'Outdoor',
                'status' => 1,
              
            ),
            4 =>
            array(
                'id'=>5,
                'department_name' => 'Finance',
                'status' => 1,
              
            ),
            5 =>
            array(
                'id'=>6,
                'department_name' => 'Professional Services',
                'status' => 1,
              
            ),
        ));

    }
}
