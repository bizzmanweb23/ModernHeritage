<?php

namespace App\Http\Controllers;

use App\Models\Billing_address;
use App\Models\Shipping_address;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class PlaceOrderController extends Controller
{
    //
    public function index()
    {
        $Billing_address = Billing_address::where('user_id',auth()->user()->id)->first();
        return view('Checkout.index',compact('Billing_address'));
    }

    public function saveAddress(Request $request)
    {
        if(Billing_address::all()->first())
        {

                $user = Auth::user();
                $check = new Billing_address();
                $check->user_id = $user->id;
                $check->full_name = $user->user_name;
                $check->email = $user->email;
                $check->phone = $user->phone;
                $check->country = $request->country;
                $check->address = $request->address;
                $check->city = $request->city;
                $check->state = $request->state;
                $check->zip = $request->zip;
                $check->save();

                return view('Checkout.index');
            }
            else
            {
                $user = Auth::user();
                $check = new Billing_address();
                $check->user_id = $user->id;
                $check->full_name = $user->user_name;
                $check->email = $user->email;
                $check->phone = $user->phone;
                $check->country = $request->country;
                $check->address = $request->address;
                $check->city = $request->city;
                $check->state = $request->state;
                $check->zip = $request->zip;
                $check->save();

                return view('Checkout.index');
            }

    }

    public function shipChange(Request $request)
    {
        $data = DB::table('shipping_addresses')->where('id', '=', $request->input('ship1'))->update([

                'full_name_ship'=> $request->input('full_name_ship'),
                'email_ship'=> $request->input('email_ship'),
                'phone_ship'=> $request->input('phone_ship'),
                'country_ship'=> $request->input('country_ship'),
                'address_ship'=> $request->input('address_ship'),
                'state_ship'=> $request->input('state_ship'),
                'city_ship'=> $request->input('city_ship'),
                'zip_ship'=> $request->input('zip_ship'),

        ]);
        if($data)
        {
            return view('Frontend.Shipping.index');
        }

    }
    public function fetchAddress(Request $request)
    {
        if($request->info)
        {
            $data = Billing_address::orderBy('id','desc')->limit(1)->get();
            return view('Checkout.index')->with('Bill',$data);
        }

    }

    public function confirmPayment()
    {
        return view('Frontend.Shipping.confirm');
    }
    public function saveOrders(Request $request)
    {
        
    }
}
