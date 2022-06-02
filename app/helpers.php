<?php
function role_test()
{
    $uid=session()->get('ADMIN_USER_ID');
    $data=DB::table('users')->where('id',$uid)->take(4)->first();
    return $data->role_id;
}

?>