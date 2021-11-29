<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.admin.dashboard.index');
    }

    public function allUsersDetails()
    {
        $allUser = User::where('role_id', '!=', 1)->get();

        return view('frontend.admin.dashboard.alluser', [
            'allUser' => $allUser,
        ]);
    }

    public function userDetails(Request $request)
    {
        if ($request->unique_id) {
            $col_name = 'unique_id';
            $col_value = $request->unique_id;
        } elseif ($request->firstname) {
            $col_name = 'firstname';
            $col_value = $request->firstname;
        }
        else{
            return redirect()->back();
        }
        $user = User::where($col_name, 'LIKE', '%'.$col_value.'%')->get();

        return view('frontend.admin.dashboard.alluser', ['allUser' => $user]);
    }

    public function memberData(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $route = explode('/', $request->path())[0];

        return view('frontend.admin.dashboard.memberData', [
            'user' => $user,
            'route' => $route,
        ]);
    }

    public function editUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
        ]);

        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->device_id = $request->device_id;
        $user->device_name = $request->device_name;

        $user->save();

        return redirect(route('users'));
    }

    public function userStatus($id, $status)
    {
        $user = User::findOrFail($id);

        $user->status = $status;

        $user->save();

        return redirect(route('users'));
    }

    public function createRole()
    {
        return view('frontend.admin.role.createRole');
    }

    public function saveRole(Request $request)
    {
        $data = $request->validate([
            'role_name' => 'required|unique:roles,name',
        ]);

        $role = new Role();

        $role->name = $data['role_name'];
        $role->guard_name = '0';

        $role->save();

        return redirect(route('users'));
    }

    //customer management

    public function allCustomerDetails()
    {
        $allCustomer = Customer::get(); 
                                                              
        return view('frontend.admin.Customer.allCustomer',['allCustomer' => $allCustomer]); 
    }

    public function customerDetails(Request $request)
    {
        if($request->unique_id)
        {
            $col_name = 'unique_id';
            $col_value = $request->unique_id;
        }
        elseif($request->customer_name)
        {
            $col_name = 'customer_name';
            $col_value = $request->customer_name;
        }
        $customer =  Customer::where($col_name,$col_value)
                           ->get();
        
        return view('frontend.admin.customer.allcustomer',['allcustomer' => $customer]);  
    }

    public function addcustomer(Request $request)
    {
        $countryCodes = CountryCode::get();
        return view('frontend.admin.customer.addcustomer',['countryCodes' => $countryCodes]);   
    }


    public function savecustomer(Request $request)
    {       
        $data = $request->validate([
            'customer_type' => 'required',
            'customer_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email:rfc,dns|unique:customers,email',
        ]);
        $unique_id = customer::orderBy('id', 'desc')->first();
        if($unique_id)
        {
            $number = str_replace('MHC', '', $unique_id->unique_id);
        }
        else
        {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHC00001';
        } else {
            $number = "MHC" . sprintf("%05d", $number + 1);
        }

        if($request->file('customer_image')){
            $file_type = $request->file('customer_image')->extension();
            $file_path = $request->file('customer_image')->storeAs('images/customers',$number.'.'.$file_type,'public');
            $request->file('customer_image')->move(public_path('images/customers'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        $customer = new customer;
        $customer->customer_type = $data['customer_type'];
        $customer->unique_id = $number;
        $customer->customer_name = $data['customer_name'];
        $customer->address = $data['address'];
        $customer->state = $request->state;
        $customer->zipcode = $request->zipcode;
        $customer->country = $request->country;
        $customer->gst = $request->gst;
        $customer->mobile = $request->country_code_m . $data['mobile'];
        $customer->email = $data['email'];
        $customer->website = $request->website;
        $customer->customer_image = $file_path;
        $customer->status = 1;
        $customer->save();

        return redirect(route('allcustomer'));
    }

    public function customerData(Request $request,$id)
    {
        $customer = customer::findOrFail($id);
        $route = explode("/",$request->path())[0];
        $service = Service::get();
        $v_service = json_decode($customer->service_id);
        return view('frontend.admin.customer.customerData', ['customer' => $customer, 'route' => $route, 'service' => $service, 'v_service' => $v_service]);
    }

    public function editcustomer(Request $request, $id)
    {
        $data = $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);

        $customer = customer::findOrFail($id);
        if($request->file('customer_image')){
            $file_type = $request->file('customer_image')->extension();
            $file_path = $request->file('customer_image')->storeAs('images/customers',$customer->unique_id.'.'.$file_type,'public');
            $request->file('customer_image')->move(public_path('images/customers'),$customer->unique_id.'.'.$file_type);
        }
        else
        {
            $file_path = $customer->customer_image;
        }
        $customer->customer_name = $data['customer_name'];
        $customer->address = $data['address'];
        $customer->state = $request->state;
        $customer->zipcode = $request->zipcode;
        $customer->country = $request->country;
        $customer->gst = $request->gst;
        $customer->mobile = $request->country_code_m . $data['mobile'];
        $customer->email = $data['email'];
        $customer->website = $request->website;
        $customer->service_id = json_encode($request->service);
        $customer->customer_image = $file_path;
        $customer->save();

        return redirect(route('allcustomer'));
    }

    public function customerStatus($id,$status)
    {
        $customer = customer::findOrFail($id);

        $customer->status = $status;

        $customer->save();

        return redirect(route('allcustomer'));
    }


}
