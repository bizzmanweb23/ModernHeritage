<?php

namespace App\Http\Controllers;

use App\Models\CountryCode;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\GST;
use App\Models\Tag;
use App\Models\Customer;
use App\Models\CustomerContact;
use App\Models\PaymentTerms;
use App\Models\SalesPerson;
use App\Models\DeliveryMethod;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            $customer_contact->contact_image = $file_path_contact;
            $customer_contact->save();
        }

        return redirect(route('allcustomer'));
    }

    public function customerData(Request $request,$id)
    {
        $customer = Customer::findOrFail($id);
        $customer_contacts = CustomerContact::where('customer_id', $id)->get();
        $i = 1;
        foreach($customer_contacts as $contact){
            $contact->index = $i;
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
        $customer->status = 1;
        $customer->tags = json_encode($request->tag);  
        $customer->salesperson = $request->salesperson;  
        $customer->deliveryMethod = $request->deliveryMethod; 
        $customer->payment_terms = $request->paymentTerms;  
        $customer->save();

        for ($i=1; $i <= $request->address_row_count; $i++) {
            $customer_contact_id = $request->input('existing_contact_id'.$i);
            if(isset($customer_contact_id))
            {
                $customer_contact = CustomerContact::findOrFail($customer_contact_id);
                $contact_image = $customer->contact_image;
            }
            else
            {
                $customer_contact = new CustomerContact;
                $contact_image = null;
            }
            $str_time = time();
            if($request->file('contact_image'.$i)){
                $file_type_contact = $request->file('contact_image'.$i)->extension();
                $file_path_contact = $request->file('contact_image'.$i)->storeAs('images/contacts',$customer->unique_id.$str_time.'.'.$file_type_contact,'public');
                $request->file('contact_image'.$i)->move(public_path('images/contacts'),$customer->unique_id.$str_time.'.'.$file_type_contact);
            }
            else
            {
                $file_path_contact = $contact_image;
            }
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
            $customer_contact->contact_image = $file_path_contact;
            $customer_contact->save();
        }

        return redirect(route('allcustomer'));
    }

    public function customerStatus($id,$status)
    {
        $customer = Customer::findOrFail($id);

        $customer->status = $status;

        $customer->save();

        return redirect(route('allcustomer'));
    }

}
