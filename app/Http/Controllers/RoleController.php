<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RoleController extends Controller
{
    //
    public function allRoles()
    {
       $allRoles['allRoles'] = DB::table('users')->select('user_type')->distinct()->get();
       
    
        return view('frontend.admin.role.index',$allRoles);
    }
    public function  createRole()
    {
    
        return view('frontend.admin.role.createRole');
    }
    public function  saveRole(Request $request)
    {
        DB::table('roles')->insert([
            'name'=>$request->role_name,
            'guard_name'=>$request->status     
           ]);
        return redirect(route('roles'))->with('message','Role inserted successfully');
    }
    public function  editRole($id)
    {
       $data['data'] = DB::table('roles')->where('id',$id)->first();
        return view('frontend.admin.role.editRole',$data);
    }

    public function  updateRole(Request $request)
    {
        DB::table('roles')->where('id',$request->id)->update([
            'name'=>$request->role_name,
            'guard_name'=>$request->status     
           ]);
        return redirect(route('roles'))->with('message','Role updated successfully');
    }

    public function  deleteRole(Request $request)
    {
        DB::table('roles')->where('id',$request->id)->delete();
        return json_encode(1);
    }

}
