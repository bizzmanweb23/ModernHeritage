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
        
        return view('frontend.admin.customer.allCustomer',['allCustomer' => $customer]);  
    }

    public function addcustomer(Request $request)
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


    public function savecustomer(Request $request)
    {       
        $data = $request->validate([
            'customer_type' => 'required',
            'customer_name' => 'required',
            'address' => 'required',
            'mobile' => 'required',
            'email' => 'required|email:rfc,dns|unique:customers,email',
        ]);
        if ($request->customer_type=='company') 
        {
            $request->validate([
                'gst_treatment' => 'required'
            ]);
        }
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

    public function editcustomer(Request $request, $id)
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
