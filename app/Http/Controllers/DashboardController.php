<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\GST;
use App\Models\Tag;
use App\Models\Customer;
use App\Models\PaymentTerms;
use App\Models\SalesPerson;
use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    // User - Management

    public function allUser()
    {
        $customers = User::leftjoin('customers', 'customers.unique_id', 'users.user_id')
                        ->where('users.user_type', 'customer')
                        ->select('users.*','customers.customer_image', 'customers.mobile')
                        ->get();
        $allUser = [];
        foreach ($customers as $c) {
            array_push($allUser, $c);
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
            'password' => 'required',
            'user_type' => 'required',            
        ]);

        if ($request->user_type == 'employee')
        {
            $request->validate([
                'website' => 'required'            
            ]);

            // TODO: add in employee table
        }
        elseif ($request->user_type == 'customer')
        {
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
            
            $customer = new customer;
            $customer->unique_id = $number;
            $customer->customer_name = $data['user_name'];
            $customer->email = $data['email'];
            $customer->mobile = $request->country_code_m . $data['mobile'];
            $customer->customer_image = $file_path;
            $customer->status = 1;
            $customer->save();
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
        if ($request->user_type == 'customer')
        {
            $user->user_id = $customer->unique_id;
            $user->sales = $request->sales;
            $user->project = $request->project;
            $user->inventory = $request->inventory;
            $user->purchase = $request->purchase;
            $user->employees = $request->employees;
            $user->bom_purchase_request = $request->bom_purchase_request;
            $user->invoicing = $request->invoicing;
            $user->administration = $request->administration;
        }
        elseif ($request->user_type == 'employee')
        {
            // TODO: employee unique id needs to be stored 
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
                        ->select('users.*','customers.customer_image', 'customers.mobile')
                        ->first();
        }
        return view('frontend.admin.user.userData',['user' => $user, 'countryCodes' => $countryCodes]);
    }

    // public function createRole()
    // {
    //     return view('frontend.admin.role.createRole');
    // }

    // public function saveRole(Request $request)
    // {
    //     $data = $request->validate([
    //         'role_name' => 'required|unique:roles,name',
    //     ]);

    //     $role = new Role();

    //     $role->name = $data['role_name'];
    //     $role->guard_name = '0';

    //     $role->save();

    //     return redirect(route('users'));
    // }

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
        
        return view('frontend.admin.customer.allCustomer',['allCustomer' => $customer]);  
    }

    public function addCustomer(Request $request)
    {
        $countryCodes = CountryCode::get();
        $gst = GST::get();
        $tag = Tag::get();
        $paymentTerms = PaymentTerms::get();
        $salesPerson = SalesPerson::get();
        $deliveryMethod = DeliveryMethod::get();
        return view('frontend.admin.customer.addCustomer',['countryCodes' => $countryCodes,
                                                            'gst' => $gst, 
                                                            'tag' => $tag, 
                                                            'paymentTerms' => $paymentTerms, 
                                                            'salesPerson' => $salesPerson,
                                                            'deliveryMethod' => $deliveryMethod
                                                        ]);   
    }


    public function saveCustomer(Request $request)
    {       
        $data = $request->validate([
            'customer_type' => 'required',
            'customer_name' => 'required',
            'address' => 'required',
            'country_code_m' => 'required',
            'mobile' => 'required',
            'email' => 'required|email:rfc,dns|unique:customers,email',
        ]);
        if ($request->customer_type=='company') 
        {
            $request->validate([
                'gst_treatment' => 'required'
            ]);
        }
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

        if($request->file('customer_image')){
            $file_type = $request->file('customer_image')->extension();
            $file_path = $request->file('customer_image')->storeAs('images/customers',$number.'.'.$file_type,'public');
            $request->file('customer_image')->move(public_path('images/customers'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        if($request->file('contact_image')){
            $file_type_contact = $request->file('contact_image')->extension();
            $file_path_contact = $request->file('contact_image')->storeAs('images/contact',$number.'.'.$file_type_contact,'public');
            $request->file('contact_image')->move(public_path('images/contact'),$number.'.'.$file_type_contact);
        }
        else
        {
            $file_path_contact = null;
        }

        $customer = new customer;
        $customer->customer_type = $data['customer_type'];
        $customer->unique_id = $number;
        $customer->customer_name = $data['customer_name'];
        $customer->address = $data['address'];
        $customer->state = $request->state;
        $customer->zipcode = $request->zipcode;
        $customer->country = $request->country;
        $customer->gst = $request->gst_treatment;
        $customer->gst_no = $request->gst_no;
        $customer->mobile = $request->country_code_m . $data['mobile'];
        $customer->email = $data['email'];
        $customer->website = $request->website;
        $customer->customer_image = $file_path;
        $customer->contact_image = $file_path_contact;
        $customer->status = 1;
        $customer->tags = json_encode($request->tag);  
        $customer->salesperson = $request->salesperson;  
        $customer->deliveryMethod = $request->deliveryMethod; 
        $customer->payment_terms = $request->paymentTerms; 
        $customer->contact_type = $request->contact_type;  
        $customer->contact_name = $request->contact_name;  
        $customer->contact_email = $request->contact_email;  
        $customer->contact_title = $request->contact_title;  
        $customer->contact_address = $request->contact_address;  
        $customer->contact_phone = $request->contact_phone;  
        $customer->contact_job_position = $request->contact_job_position;  
        $customer->contact_state = $request->contact_state;  
        $customer->contact_zipcode = $request->contact_zipcode;  
        $customer->contact_country = $request->contact_country;  
        $customer->contact_mobile = $request->contact_mobile;  
        $customer->contact_notes = $request->contact_notes;  
        $customer->save();

        return redirect(route('allcustomer'));
    }

    public function customerData(Request $request,$id)
    {
        $customer = customer::findOrFail($id);
        $route = explode("/",$request->path())[0];
        $countryCodes = CountryCode::get();
        $gst = GST::get();
        $tag = Tag::get();
        $salesperson = SalesPerson::get();
        $deliveryMethod = DeliveryMethod::get();
        $paymentTerms = PaymentTerms::get();
        $selected_tags = json_decode($customer->tags);
        $selected_tags_name = [];
        if(isset($selected_tags)){
            foreach($tag as $t){
                if(in_array($t->id,$selected_tags)){
                    array_push($selected_tags_name, $t->tag_name);
                }
            }
        }
        return view('frontend.admin.customer.customerData', ['customer' => $customer, 
                                                            'route' => $route,
                                                            'countryCodes' => $countryCodes,
                                                            'gst' => $gst,
                                                            'tag' => $tag,
                                                            'selected_tags' => $selected_tags,
                                                            'selected_tags_name' => $selected_tags_name,
                                                            'salesperson' => $salesperson,
                                                            'deliveryMethod' => $deliveryMethod,
                                                            'paymentTerms' => $paymentTerms
                                                        ]);
    }

    public function editCustomer(Request $request, $id)
    {
        $data = $request->validate([
            'customer_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'customer_type' => 'required',
            'email' => 'required|email:rfc,dns',
        ]);

        if ($request->customer_type=='company') 
        {
            $request->validate([
                'gst_treatment' => 'required'
            ]);
        }
        $customer = Customer::findOrFail($id);
        if($request->file('customer_image')){
            $file_type = $request->file('customer_image')->extension();
            $file_path = $request->file('customer_image')->storeAs('images/customers',$customer->unique_id.'.'.$file_type,'public');
            $request->file('customer_image')->move(public_path('images/customers'),$customer->unique_id.'.'.$file_type);
        }
        else
        {
            $file_path = $customer->customer_image;
        }

        if($request->file('contact_image')){
            $file_type_contact = $request->file('contact_image')->extension();
            $file_path_contact = $request->file('contact_image')->storeAs('images/contact',$customer->unique_id.'.'.$file_type_contact,'public');
            $request->file('contact_image')->move(public_path('images/contact'),$customer->unique_id.'.'.$file_type_contact);
        }
        else
        {
            $file_path_contact = $customer->contact_image;
        }

        $customer->customer_type = $data['customer_type'];
        $customer->customer_name = $data['customer_name'];
        $customer->address = $data['address'];
        $customer->state = $request->state;
        $customer->zipcode = $request->zipcode;
        $customer->country = $request->country;
        $customer->gst = $request->gst_treatment;
        $customer->gst_no = $request->gst_no;
        $customer->mobile = $request->country_code_m . $data['mobile'];
        $customer->email = $data['email'];
        $customer->website = $request->website;
        $customer->customer_image = $file_path;
        $customer->contact_image = $file_path_contact;
        $customer->status = 1;
        $customer->tags = json_encode($request->tag);  
        $customer->salesperson = $request->salesperson;  
        $customer->deliveryMethod = $request->deliveryMethod; 
        $customer->payment_terms = $request->paymentTerms; 
        $customer->contact_type = $request->contact_type;  
        $customer->contact_name = $request->contact_name;  
        $customer->contact_email = $request->contact_email;  
        $customer->contact_title = $request->contact_title;  
        $customer->contact_address = $request->contact_address;  
        $customer->contact_phone = $request->contact_phone;  
        $customer->contact_job_position = $request->contact_job_position;  
        $customer->contact_state = $request->contact_state;  
        $customer->contact_zipcode = $request->contact_zipcode;  
        $customer->contact_country = $request->contact_country;  
        $customer->contact_mobile = $request->contact_mobile;  
        $customer->contact_notes = $request->contact_notes;  
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
