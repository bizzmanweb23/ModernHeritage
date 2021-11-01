<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\GST;
use App\Models\Tax;
use App\Models\CountryCode;
use App\Models\LogisticStage;
use App\Models\LogisticLead;
use App\Models\LogisticLeadsproduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogisticController extends Controller
{
    public function allClients()
    {
        $allClients = Client::get();
        return view('frontend.admin.logisticManagement.clients.allClients', ['allClients' => $allClients]);
    }
    
    public function addClient()
    {
        $countryCodes = CountryCode::get();
        return view('frontend.admin.logisticManagement.clients.addClient', ['countryCodes' => $countryCodes]);
    }
    
    public function saveClient(Request $request)
    {
        $data = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns',
            'phone' => 'required',
            'password' => 'required',
            'address' => 'required',
            'address2' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
        ]);

        $unique_id = Client::orderBy('id', 'desc')->first();
        if($unique_id)
        {
            $number = str_replace('MHC', '', $unique_id->unique_id);
        }
        else
        {
            $number = 0;
        } 
        if ($number == 0) {
            $number = 'MHC000001';
        } else {
            $number = "MHC" . sprintf("%06d", $number + 1);
        }

        if($request->file('client_image')){
            $file_type = $request->file('client_image')->extension();
            $file_path = $request->file('client_image')->storeAs('images/clients',$number.'.'.$file_type,'public');
            $request->file('client_image')->move(public_path('images/clients'),$number.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        $client = new Client;

        $client->client_type = $request->client_type;
        $client->unique_id = $number;
        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->email = $request->email;
        $client->phone = $request->country_code . $request->phone;
        $client->address = $request->address;
        $client->address2 = $request->address2;
        $client->state = $request->state;
        $client->zipcode = $request->zipcode;
        $client->country = $request->country;
        $client->gst = $request->gst;
        $client->password = Hash::make($request->password);
        $client->client_image = $file_path;
        $client->status = 1;

        $client->save();

        return redirect(route('allclients'));
    }

    public function getRequest()
    {
        $logistic_stage = LogisticStage::get();
        $logistic_lead = LogisticLead::get();
        //$countryCodes = CountryCode::get();
        //$path = 'client';
        return view('frontend.admin.logisticManagement.logistic_crm.index',['logistic_stage' => $logistic_stage,'logistic_lead' => $logistic_lead]);
    }

    public function searchClientRequest(Request $request)
    {
       
        $client = Client::where('firstname', 'LIKE', '%'.$request->term.'%')
                        ->get();
        if ($client->count() > 0) {
            foreach ($client as $item) {
                $data[] = [
                    'label' => $item->firstname.' '.$item->lastname,
                    'id' => $item->id,
                    'email' => $item->email,
                    'phone' => $item->phone,
                ];
            }
        } else {
            $data[] = ['label' => 'Not Found', 'id' => 0];
        }
        echo json_encode($data);
    }

    public function addRequest()
    {
        return view('frontend.admin.logisticManagement.logistic_crm.addLead');
    }

    public function saveRequest(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'client_name' => 'required',
            'pickup_from' => 'required',
            'pickup_add_1' => 'required',
            'pickup_add_2' => 'required',
            'pickup_add_3' => 'required',
            'pickup_pin' => 'required',
            'pickup_state' => 'required',
            'pickup_country' => 'required',
            'pickup_location' => 'required',
            'pickup_email' => 'required|email:rfc,dns',
            'pickup_phone' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'delivered_to' => 'required',
            'delivery_add_1' => 'required',
            'delivery_add_2' => 'required',
            'delivery_add_3' => 'required',
            'delivery_pin' => 'required',
            'delivery_state' => 'required',
            'delivery_country' => 'required',
            'delivery_location' => 'required',
            'delivery_email' => 'required|email:rfc,dns',
            'delivery_phone' => 'required',
        ]);

        $unique_id = LogisticLead::orderBy('id', 'desc')->first();
        if($unique_id)
        {
            $number = str_replace('MHL', '', $unique_id->unique_id);
        }
        else
        {
            $number = 0;
        } 
        if ($number == 0) {
            $number = 'MHL000001';
        } else {
            $number = "MHL" . sprintf("%06d", $number + 1);
        }

        $logistic_lead = new LogisticLead;

        $logistic_lead->stage_id = 1;
        $logistic_lead->unique_id = $number;
        $logistic_lead->client_id = $data['client_id'];
        $logistic_lead->client_name = $data['client_name'];
        $logistic_lead->pickup_from = $data['pickup_from'];
        $logistic_lead->pickup_add_1 = $data['pickup_add_1'];
        $logistic_lead->pickup_add_2 = $data['pickup_add_2'];
        $logistic_lead->pickup_add_3 = $data['pickup_add_3'];
        $logistic_lead->pickup_pin = $data['pickup_pin'];
        $logistic_lead->pickup_state = $data['pickup_state'];
        $logistic_lead->pickup_country = $data['pickup_country'];
        $logistic_lead->pickup_location = $data['pickup_location'];
        $logistic_lead->pickup_email = $data['pickup_email'];
        $logistic_lead->pickup_phone = $data['pickup_phone'];
        $logistic_lead->contact_name = $data['contact_name'];
        $logistic_lead->contact_phone = $data['contact_phone'];
        $logistic_lead->delivered_to = $data['delivered_to'];
        $logistic_lead->delivery_add_1 = $data['delivery_add_1'];
        $logistic_lead->delivery_add_2 = $data['delivery_add_2'];
        $logistic_lead->delivery_add_3 = $data['delivery_add_3'];
        $logistic_lead->delivery_pin = $data['delivery_pin'];
        $logistic_lead->delivery_state = $data['delivery_state'];
        $logistic_lead->delivery_country = $data['delivery_country'];
        $logistic_lead->delivery_location = $data['delivery_location'];
        $logistic_lead->delivery_email = $data['delivery_email'];
        $logistic_lead->delivery_phone = $data['delivery_phone'];

        $logistic_lead->save();

        for ($i=1; $i <= $request->product_row_count; $i++) { 
            $req_product_name = 'product_name'.strval($i);
            $req_dimension = 'dimension'.strval($i);
            $req_quantity = 'quantity'.strval($i);
            $req_uom = 'uom'.strval($i);
            $req_area = 'area'.strval($i);
            $req_weight = 'weight'.strval($i);
            
            $logistic_leads_product = new LogisticLeadsProduct;

            $logistic_leads_product->lead_id = $number;         //same unique_id of logistic_leads table
            $logistic_leads_product->product_name = $request->$req_product_name;
            $logistic_leads_product->dimension = $request->$req_dimension;
            $logistic_leads_product->quantity = $request->$req_quantity;
            $logistic_leads_product->uom = $request->$req_uom;
            $logistic_leads_product->area = $request->$req_area;
            $logistic_leads_product->weight = $request->$req_weight;

            $logistic_leads_product->save();
        }

        return redirect(route('logistic_crm'));
    }

    public function updateLogisticStage($lead_id, $stage_id)
    {
        $lead = LogisticLead::findOrFail($lead_id);
        $lead->stage_id = $stage_id;
        $lead->save();

        return redirect()->back();
    }

    public function viewRequest($lead_id)
    {
        $lead = LogisticLead::findOrFail($lead_id); 
        return view('frontend.admin.logisticManagement.logistic_crm.viewLead',['lead' => $lead]);
    }

    public function updateRequest(Request $request, $lead_id)
    {
        
        $data = $request->validate([
            'client_name' => 'required',
            'delivered_to' => 'required',
            'contact_name' => 'required',
            'delivery_location' => 'required',
            'contact_phone' => 'required|numeric',
            'delivery_phone' => 'required|numeric',          
        ]);
        $logistic_lead = LogisticLead::findOrFail($lead_id);
        $logistic_lead->client_name = $data['client_name'];
        $logistic_lead->delivered_to = $data['delivered_to'];
        $logistic_lead->contact_name = $data['contact_name'];
        $logistic_lead->delivery_location = $data['delivery_location'];
        $logistic_lead->contact_phone = $data['contact_phone'];
        $logistic_lead->delivery_phone = $data['delivery_phone'];
        $logistic_lead->save();

        return redirect()->back();
    }

    public function addQuotation($lead_id)
    {
        $lead = LogisticLead::findOrFail($lead_id);
        $gst = GST::get();
        $tax = Tax::get();
        return view('frontend.admin.logisticManagement.logistic_crm.addQuotation',['lead' => $lead, 'gst' => $gst, 'tax' => $tax]);
    }
}