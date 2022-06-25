<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class payStructure extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('pay_structures')->delete();
        \DB::table('pay_structures')->insert(array(
            0 =>
            array(
                'id'=>1,
                'year' => 2022,
                'commission'=> 1.5,
                'cpf'=> 1.5,
                'insurance'=> 1.5,
                'medical_leave_entitlement'=> 1.5,
                'medical_allowance'=> 1.5,
            ),
        ));
    }
    }

