<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('roles')->insert(array(
            0 =>
            array(
                'id'=>1,
                'name' => 'Admin',
                'guard_name' => 1,
             
               
            ),
            1 =>
            array(
                'id'=>2,
                'name' => 'User',
                'guard_name' => 1,
              
            ),
          
            2 =>
            array(
                'id'=>3,
                'name' => 'Employee',
                'guard_name' => 1,
              
            ),
            3 =>
            array(
                'id'=>4,
                'name' => 'Warehouse Manager',
                'guard_name' => 1,
              
            ),
         
        ));
    }
}
