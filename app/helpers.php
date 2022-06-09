<?php

use Carbon\Carbon;

function role_test()
{
    $uid = session()->get('ADMIN_USER_ID');
    $data = DB::table('users')->where('id', $uid)->take(4)->first();
    return $data->role_id;
}
function date_diff_day($date)
{
  
    $today = new DateTime();
    $date_1 = new DateTime($date);
    $interval = $today->diff($date_1);
 
    if($interval->format("%r%a")<=30)
    {
        return 'E';
    }
    else
    {
        return 0;
    }

   
}
