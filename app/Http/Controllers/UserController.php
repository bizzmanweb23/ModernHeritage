<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    // User - Management

    public function allUser()
    {
        $customers = User::leftjoin('customers', 'customers.unique_id', 'users.user_id')
                        ->where('users.user_type', 'customer')
                        ->select('users.*','customers.customer_image as user_image', 'customers.mobile as user_mobile')
                        ->get();
        $allUser = [];
        foreach ($customers as $c) {
            array_push($allUser, $c);
        }

        $employees = User::leftjoin('employees', 'employees.unique_id', 'users.user_id')
                            ->where('users.user_type', 'employee')
                            ->select('users.*','employees.emp_image as user_image', 'employees.work_mobile as user_mobile')
                            ->get();
        
        foreach ($employees as $e) {
            array_push($allUser, $e);
        }
        return view('frontend.admin.user.index', [
            'allUser' => $allUser,
        ]);
    }

    public function addUser()
    {
        $countryCodes = CountryCode::get();
        return view('frontend.admin.user.addUser', ['countryCodes' => $countryCodes]);
    }

    public function saveUser(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'country_code_m' => 'required',
            'mobile' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
            'user_type' => 'required',            
        ]);

        if ($request->user_type == 'customer')
        {
            $request->validate([
                'website' => 'required'            
            ]);

            $unique_id = Customer::orderBy('id', 'desc')->first();
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
            
            if($request->file('user_image')){
                $file_type = $request->file('user_image')->extension();
                $file_path = $request->file('user_image')->storeAs('images/customers',$number.'.'.$file_type,'public');
                $request->file('user_image')->move(public_path('images/customers'),$number.'.'.$file_type);
            }
            else
            {
                $file_path = null;
            }

            $customer = new Customer;
            $customer->unique_id = $number;
            $customer->customer_name = $data['user_name'];
            $customer->email = $data['email'];
            $customer->mobile = $request->country_code_m . $data['mobile'];
            $customer->customer_image = $file_path;
            $customer->status = 1;
            $customer->save();
            
        }
        elseif ($request->user_type == 'employee')
        {
            $unique_id = Employee::orderBy('id', 'desc')->first();
            if($unique_id)
            {
                $number = str_replace('MHE', '', $unique_id->unique_id);
            }
            else
            {
                $number = 0;
            }
            if ($number == 0) {
                $number = 'MHE00001';
            } else {
                $number = "MHE" . sprintf("%05d", $number + 1);
            }
            
            if($request->file('user_image')){
                $file_type = $request->file('user_image')->extension();
                $file_path = $request->file('user_image')->storeAs('images/employees',$number.'.'.$file_type,'public');
                $request->file('user_image')->move(public_path('images/employees'),$number.'.'.$file_type);
            }
            else
            {
                $file_path = null;
            }
            
            $employee = new employee;
            $employee->unique_id = $number;
            $employee->emp_name = $data['user_name'];
            $employee->work_email = $data['email'];
            $employee->work_mobile = $request->country_code_m . $data['mobile'];
            $employee->emp_image = $file_path;
            $employee->status = 1;
            $employee->save();
        }

        $unique_id = User::orderBy('id', 'desc')->first();
        if($unique_id)
        {
            $number = str_replace('MHU', '', $unique_id->unique_id);
        }
        else
        {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHU00001';
        } else {
            $number = "MHU" . sprintf("%05d", $number + 1);
        }

        $user = new User;
        $user->unique_id = $number;
        $user->user_name = $data['user_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->user_type = $data['user_type'];
        if ($request->user_type == 'employee')
        {
            $user->user_id = $employee->unique_id;
            $user->sales = $request->sales;
            $user->project = $request->project;
            $user->inventory = $request->inventory;
            $user->purchase = $request->purchase;
            $user->employees = $request->employees;
            $user->bom_purchase_request = $request->bom_purchase_request;
            $user->invoicing = $request->invoicing;
            $user->administration = $request->administration;
            $user->role_id = 3;
        }
        elseif ($request->user_type == 'customer')
        {
            $user->user_id = $customer->unique_id;
            $user->website = $request->website;
        }
        $user->status = 1;
        
        $user->save();

        return redirect(route('index'));
    }

    public function userData($id)
    {
        $u = User::findOrFail($id);
        $countryCodes = CountryCode::get();
        if($u->user_type == 'customer')
        {
            $user = User::leftjoin('customers', 'customers.unique_id', 'users.user_id')
                        ->where('users.user_type', 'customer')
                        ->where('users.id', $id)
                        ->select('users.*','customers.customer_image as user_image', 'customers.mobile as user_mobile')
                        ->first();
        }
        elseif ($u->user_type == 'employee') {
            $user = User::leftjoin('employees', 'employees.unique_id', 'users.user_id')
                        ->where('users.user_type', 'employee')
                        ->where('users.id', $id)
                        ->select('users.*','employees.emp_image as user_image', 'employees.work_mobile as user_mobile')
                        ->first();
        }
        return view('frontend.admin.user.userData',['user' => $user, 'countryCodes' => $countryCodes]);
    }

    public function editUser(Request $request, $id)
    {
        $data = $request->validate([
            'user_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'country_code_m' => 'required',
            'mobile' => 'required',
            'user_type' => 'required',            
        ]);

        if ($request->user_type == 'customer')
        {
            $request->validate([
                'website' => 'required'            
            ]);

            $user = User::leftjoin('customers', 'customers.unique_id', 'users.user_id')
                        ->where('users.id', $id)
                        ->select('users.*','customers.customer_image', 'customers.mobile')
                        ->first();
            if($request->file('user_image')){
                $file_type = $request->file('user_image')->extension();
                $file_path = $request->file('user_image')->storeAs('images/customers',$user->user_id.'.'.$file_type,'public');
                $request->file('user_image')->move(public_path('images/customers'),$user->user_id.'.'.$file_type);
            }
            else
            {
                $file_path = $user->customer_image;
            }

            $customer = Customer::where('unique_id', $user->user_id)->first();
            $customer->customer_name = $data['user_name'];
            $customer->email = $data['email'];
            $customer->mobile = $request->country_code_m . $data['mobile'];
            $customer->customer_image = $file_path;
            $customer->save();
            
        }
        elseif ($request->user_type == 'employee')
        {
            $user = User::leftjoin('employees', 'employees.unique_id', 'users.user_id')
                        ->where('users.id', $id)
                        ->select('users.*','employees.emp_image', 'employees.work_mobile')
                        ->first();
            
            if($request->file('user_image')){
                $file_type = $request->file('user_image')->extension();
                $file_path = $request->file('user_image')->storeAs('images/employees',$user->user_id.'.'.$file_type,'public');
                $request->file('user_image')->move(public_path('images/employees'),$user->user_id.'.'.$file_type);
            }
            else
            {
                $file_path = $user->emp_image;
            }

            $employee = Employee::where('unique_id', $user->user_id)->first();
            $employee->emp_name = $data['user_name'];
            $employee->work_email = $data['email'];
            $employee->work_mobile = $request->country_code_m . $data['mobile'];
            $employee->emp_image = $file_path;
            $employee->save();
        }

        $user->user_name = $data['user_name'];
        $user->email = $data['email'];
        $user->user_type = $data['user_type'];
        $user->sales = $request->sales;
        $user->project = $request->project;
        $user->inventory = $request->inventory;
        $user->purchase = $request->purchase;
        $user->employees = $request->employees;
        $user->bom_purchase_request = $request->bom_purchase_request;
        $user->invoicing = $request->invoicing;
        $user->administration = $request->administration;
        $user->website = $request->website;
    
        $user->save();

        return redirect(route('index'));
    }

}
