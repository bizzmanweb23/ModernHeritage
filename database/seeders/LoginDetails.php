<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class LoginDetails extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('employee_logins')->delete();
        \DB::table('employee_logins')->insert(array(
            0 =>
            array(
                'id'=>1,
                'emp_id' => 8,
                'login_date'=>"2022-06-27 10:00",
                'logout_date'=>"2022-06-27 19:00",
            
              
            ),
            1 =>
            array(
                'id'=>2,
                'emp_id' => 9,
                'login_date'=>"2022-06-27 10:00",
                'logout_date'=>"2022-06-27 19:00",
              
            ),
            2 =>
            array(
                'id'=>3,
                'emp_id' => 10,
                'login_date'=>"2022-06-27 10:00",
                'logout_date'=>"2022-06-27 19:00",
              
            ),
            3 =>
            array(
                'id'=>4,
                'emp_id' => 9,
                'login_date'=>"2022-06-27 10:00",
                'logout_date'=>"2022-06-27 19:00",
              
            ),
            4 =>
            array(
                'id'=>5,
                'emp_id' => 8,
                'login_date'=>"2022-06-27 10:00",
                'logout_date'=>"2022-06-27 19:00",
              
            ),
           
        ));
    }
}
