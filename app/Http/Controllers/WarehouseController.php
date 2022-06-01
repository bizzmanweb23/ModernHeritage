<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WareHouse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\CountryCode;
use DB;



class WarehouseController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $data['data'] = WareHouse::get();
        return view('frontend.admin.warehouse.index',$data);
    }
    public function addWarehouse()
    {
        $data['countryCodes'] = CountryCode::get();
        $data['country']=DB::table('countries')->get();
        return view('frontend.admin.warehouse.add',$data);
    }
    public function saveWarehouse(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email:rfc,dns',
          
        ]);


        $unique_id = User::orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MHU', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHU00001';
        } else {
            $number = "MHU" . sprintf("%05d", $number + 1);
        }


        WareHouse::insert([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile_no'=>$request->country_code_m.$request->mobile_no,
            'phone'=>$request->country_code_p.$request->phone,
            'password'=>Hash::make($request->password),
            'status'=>$request->status,
            'address_1'=>$request->address_1,
            'address_2'=>$request->address_2,
            'address_3'=>$request->address_3,
            'state'=>$request->state,
            'country_id'=>$request->country_id,
            'zipcode'=>$request->zipcode
        ]);
        $user = new User;
        $user->unique_id = $number;
        $user->user_name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 4;
        $user->status = $request->status;
        $user->save();

        DB::table('user_address')->insert([
            'user_id' => $user->id,
            'address_1' => $request->address_1,
            'address_2' => $request->address_2,
            'address_3' => $request->address_3,
            'country' => $request->country_id,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'mobile' => $request->country_code_m.$request->mobile_no

        ]);


        return redirect(route('wareHouses'));
    }
}
