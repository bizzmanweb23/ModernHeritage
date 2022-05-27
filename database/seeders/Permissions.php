<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class Permissions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('permissions')->delete();
        \DB::table('permissions')->insert(array(
            0 =>
            array(
                'id'=>1,
                'name' => 'All',
                'guard_name'=> 1
            ),
            1 =>
            array(
                'id'=>2,
                'name' => 'Order Management',
                'guard_name'=> 1
            ),
            2 =>
            array(
                'id'=>3,
                'name' => 'Inventory Management',
                'guard_name'=> 1
            ),
            3 =>
            array(
                'id'=>4,
                'name' => 'Customer Management',
                'guard_name'=> 1
            ),
            4 =>
            array(
                'id'=>5,
                'name' => 'Warehouse Management',
                'guard_name'=> 1
            ),
            5 =>
            array(
                'id'=>6,
                'name' => 'Employee Management',
                'guard_name'=> 1
            ),
            6 =>
            array(
                'id'=>7,
                'name' => 'User Management',
                'guard_name'=> 1
            ),
        ));
    }
}
