<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\GST;
use App\Models\Tag;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\CustomerContact;
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
            // $unique_id = Employee::orderBy('id', 'desc')->first();
            // if($unique_id)
            // {
            //     $number = str_replace('MHC', '', $unique_id->unique_id);
            // }
            // else
            // {
            //     $number = 0;
            // }
            // if ($number == 0) {
            //     $number = 'MHC00001';
            // } else {
            //     $number = "MHC" . sprintf("%05d", $number + 1);
            // }
            
            // if($request->file('user_image')){
            //     $file_type = $request->file('user_image')->extension();
            //     $file_path = $request->file('user_image')->storeAs('images/employees',$number.'.'.$file_type,'public');
            //     $request->file('user_image')->move(public_path('images/employees'),$number.'.'.$file_type);
            // }
            // else
            // {
            //     $file_path = null;
            // }
            
            // $employee = new employee;
            // $employee->unique_id = $number;
            // $employee->employee_name = $data['user_name'];
            // $employee->email = $data['email'];
            // $employee->mobile = $request->country_code_m . $data['mobile'];
            // $employee->employee_image = $file_path;
            // $employee->status = 1;
            // $employee->save();
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
            // TODO: employee unique id needs to be stored 
            // $user->user_id = $employee->unique_id;
            $user->sales = $request->sales;
            $user->project = $request->project;
            $user->inventory = $request->inventory;
            $user->purchase = $request->purchase;
            $user->employees = $request->employees;
            $user->bom_purchase_request = $request->bom_purchase_request;
            $user->invoicing = $request->invoicing;
            $user->administration = $request->administration;
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
                        ->select('users.*','customers.customer_image', 'customers.mobile')
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
                $file_path = null;
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
            // $user = User::leftjoin('employees', 'employees.unique_id', 'users.user_id')
            //             ->where('users.id', $id)
            //             ->select('users.*','employees.employee_image', 'employees.mobile')
            //             ->first();
            
            // if($request->file('user_image')){
            //     $file_type = $request->file('user_image')->extension();
            //     $file_path = $request->file('user_image')->storeAs('images/employees',$user->user_id.'.'.$file_type,'public');
            //     $request->file('user_image')->move(public_path('images/employees'),$user->user_id.'.'.$file_type);
            // }
            // else
            // {
            //     $file_path = null;
            // }
            
            // $employee = Employee::where('unique_id', $user->user_id)->first();
            // $employee->employee_name = $data['user_name'];
            // $employee->email = $data['email'];
            // $employee->mobile = $request->country_code_m . $data['mobile'];
            // $employee->employee_image = $file_path;
            // $employee->save();
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
            'password' => 'required',
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

        //user table unique_id
        $unique_id_user = User::orderBy('id', 'desc')->first();
        if($unique_id_user)
        {
            $number_user = str_replace('MHU', '', $unique_id_user->unique_id);
        }
        else
        {
            $number_user = 0;
        }
        if ($number_user == 0) {
            $number_user = 'MHU00001';
        } else {
            $number_user = "MHU" . sprintf("%05d", $number_user + 1);
        }

        $user = new User;
        $user->unique_id = $number_user;
        $user->user_name = $data['customer_name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->user_id = $number;
        $user->status = 1;
        $user->user_type = "customer";
        $user->role_id = 2;
        $user->save();

        if($request->file('customer_image')){
            $file_type = $request->file('customer_image')->extension();
            $file_path = $request->file('customer_image')->storeAs('images/customers',$number.'.'.$file_type,'public');
            $request->file('customer_image')->move(public_path('images/customers'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        $customer = new Customer;
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
        $customer->status = 1;
        $customer->tags = json_encode($request->tag);  
        $customer->salesperson = $request->salesperson;  
        $customer->deliveryMethod = $request->deliveryMethod; 
        $customer->payment_terms = $request->paymentTerms; 
        $customer->save();

        for ($i=1; $i <= $request->address_row_count; $i++) {
            $str_time = time();
            if($request->file('contact_image'.$i)){
                $file_type_contact = $request->file('contact_image'.$i)->extension();
                $file_path_contact = $request->file('contact_image'.$i)->storeAs('images/contacts',$number.$str_time.'.'.$file_type_contact,'public');
                $request->file('contact_image'.$i)->move(public_path('images/contacts'),$number.$str_time.'.'.$file_type_contact);
            }
            else
            {
                $file_path_contact = null;
            }
            $customer_contact = new CustomerContact;
            $customer_contact->customer_id = $customer->id;
            $customer_contact->contact_description = $request->input('contact_description'.$i);
            $customer_contact->contact_type = $request->input('contact_type'.$i);  
            $customer_contact->contact_name = $request->input('contact_name'.$i);  
            $customer_contact->contact_email = $request->input('contact_email'.$i);  
            $customer_contact->contact_title = $request->input('contact_title'.$i);  
            $customer_contact->contact_address = $request->input('contact_address'.$i);  
            $customer_contact->contact_phone = $request->input('contact_phone'.$i);  
            $customer_contact->contact_job_position = $request->input('contact_job_position'.$i);  
            $customer_contact->contact_state = $request->input('contact_state'.$i);  
            $customer_contact->contact_zipcode = $request->input('contact_zipcode'.$i);  
            $customer_contact->contact_country = $request->input('contact_country'.$i);  
            $customer_contact->contact_mobile = $request->input('contact_mobile'.$i);  
            $customer_contact->contact_notes = $request->input('contact_notes'.$i);  
            $customer->contact_image = $file_path_contact;
            $customer_contact->save();
        }

        return redirect(route('allcustomer'));
    }

    public function customerData(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $customer_contacts = CustomerContact::where('customer_id', $id)->get();
        foreach($customer_contacts as $contacts){
            $i = 1;
            $contacts->index = $i;
            $i++;
        }
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
                                                            'customer_contacts' => $customer_contacts,
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

    // public function getCustomerContacts(Request $request)
    // {
    //     $customer_id = $request->customer_id;
    //     $customer_contacts = CustomerContact::where('customer_id', $customer_id)->get();
    //     info($customer_contacts);
    //     echo json_encode($customer_contacts);
    // }

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
            $file_path_contact = $request->file('contact_image')->storeAs('images/contacts',$customer->unique_id.'.'.$file_type_contact,'public');
            $request->file('contact_image')->move(public_path('images/contacts'),$customer->unique_id.'.'.$file_type_contact);
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
        $customer = Customer::findOrFail($id);

        $customer->status = $status;

        $customer->save();

        return redirect(route('allcustomer'));
    }

    //employeeManagement
    public function allEmployee()
    {
        $employees = Employee::get();
        return view('frontend.admin.employee.index',['employees' => $employees]);
    }

    public function addEmployee()
    {
        $countryCodes = CountryCode::get();
        $customer = Customer::get();
        return view('frontend.admin.employee.addEmployee',['customer' => $customer,
                                                            'countryCodes' => $countryCodes
                                                        ]);
    }
    
    public function saveEmployee(Request $request)
    {
        $data = $request->validate([
            'emp_name' => 'required',
            'job_position' => 'required',
            'work_email' => 'required|email:rfc,dns|unique:employees',
            'password' => 'required',
        ]);

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

        if($request->file('emp_image')){
            $file_type = $request->file('emp_image')->extension();
            $file_path = $request->file('emp_image')->storeAs('images/employees',$number.'.'.$file_type,'public');
            $request->file('emp_image')->move(public_path('images/employees'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        if($request->file('other_id_file')){
            $other_id_file_type = $request->file('other_id_file')->extension();
            $other_id_file_path = $request->file('other_id_file')->storeAs('images/employees/ids',$number.'.'.$other_id_file_type,'public');
            $request->file('other_id_file')->move(public_path('images/employees/ids'),$number.'.'.$other_id_file_type);
        }
        else
        {
            $other_id_file_path = null;
        }

        //user table unique_id
        $unique_id_user = User::orderBy('id', 'desc')->first();
        if($unique_id_user)
        {
            $number_user = str_replace('MHU', '', $unique_id_user->unique_id);
        }
        else
        {
            $number_user = 0;
        }
        if ($number_user == 0) {
            $number_user = 'MHU00001';
        } else {
            $number_user = "MHU" . sprintf("%05d", $number_user + 1);
        }

        $user = new User;
        $user->unique_id = $number_user;
        $user->user_name = $request->emp_name;
        $user->email = $request->work_email;
        $user->password = Hash::make($data['password']);
        $user->user_id = $number;
        $user->status = 1;
        $user->user_type = "employee";
        $user->role_id = 3;
        $user->save();

        $employee = new Employee;
        $employee->unique_id = $number;
        $employee->emp_name = $request->emp_name;
        $employee->job_position = $request->job_position;
        $employee->work_mobile = $request->country_code_m . $request->work_mobile;
        $employee->work_phone = $request->country_code_p . $request->work_phone;
        $employee->work_email = $request->work_email;
        $employee->department = $request->department;
        $employee->manager = $request->manager;
        $employee->default_customer = json_encode($request->default_customer);
        $employee->emp_image = $file_path;
        $employee->contact_address = $request->contact_address;
        $employee->contact_email = $request->contact_email;
        $employee->contact_phone = $request->country_code_cp . $request->contact_phone;
        $employee->bank_accnt_no = $request->bank_accnt_no;
        $employee->home_work_distance = $request->home_work_distance;
        $employee->marital_status = $request->marital_status;
        $employee->edu_certificate_level = $request->edu_certificate_level;
        $employee->field_of_study = $request->field_of_study;
        $employee->school = $request->school;
        $employee->country = $request->country;
        $employee->identification_no = $request->identification_no;
        $employee->passport_no = $request->passport_no;
        $employee->gender = $request->gender;
        $employee->dob = $request->dob;
        $employee->place_of_birth = $request->place_of_birth;
        $employee->country_of_birth = $request->country_of_birth;
        $employee->other_id_name = $request->other_id_name;
        $employee->other_id_no = $request->other_id_no;
        $employee->other_id_file = $other_id_file_path;
        $employee->	status = 1;
        
        $employee->save();

        return redirect(route('allEmployee'));
    }

}
