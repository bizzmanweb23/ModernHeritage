<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //
    public function index()
    {
        return view('Account.index');
    }
    public function edit()
    {
        return view('Account.editProfile');
    }
    public function editAddress()
    {
        return view('Account.editAddress');
    }
    public function orderHistory()
    {
        return view('Account.orderHistory');
    }
    public function store(Request $request)
    {
        $data = DB::table('users')->where('id', '=', $request->input('add1'))->update([

                'user_name'=> $request->input('user_name'),
                'email'=> $request->input('email'),
                'phone'=> $request->input('phone'),
                'password'=>Hash::make($request->input('password')),

        ]);
        if($data)
        {
            return back();
        }

    }
    public function update(Request $request)
    {
        $data = DB::table('billing_addresses')->where('id', '=', $request->input('add4'))->update([

                'full_name'=> $request->input('full_name'),
                'email'=> $request->input('email'),
                'phone'=> $request->input('phone'),
                'address'=> $request->input('address'),
                'state'=> $request->input('state'),
                'country'=> $request->input('country'),
                'zip'=> $request->input('zip'),
                'city'=> $request->input('city'),
               
                

        ]);
        if($data)
        {
            return back();
        }

    }
}
