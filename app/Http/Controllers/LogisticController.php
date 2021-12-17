<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\GST;
use App\Models\Tax;
use App\Models\CountryCode;
use App\Models\CustomerContact;
use App\Models\LogisticStage;
use App\Models\LogisticLead;
use App\Models\LogisticLeadsProduct;
use App\Models\LogisticLeadsQuotation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LogisticController extends Controller
{
    public function getRequest()
    {
        $logistic_stage = LogisticStage::get();
        $logistic_lead = LogisticLead::get();
        //$countryCodes = CountryCode::get();
        //$path = 'client';
        return view('frontend.admin.logisticManagement.logistic_crm.index',['logistic_stage' => $logistic_stage,'logistic_lead' => $logistic_lead]);
    }

    public function addRequest()
    {
        return view('frontend.admin.logisticManagement.logistic_crm.addLead');
    }

    public function searchContact(Request $request)
    {  
        $contacts = CustomerContact::where('customer_id', '=', $request->client_id)
                                    ->get();
        if ($contacts->count() > 0) {
            foreach ($contacts as $item) {
            info($item);
                $data[] = [
                    'label' => $item->contact_name,
                    'id' => $item->id,
                    'email' => $item->contact_email,
                    'mobile' => $item->contact_mobile,
                ];
            }
        } else {
            $data[] = ['label' => 'Not Found', 'id' => 0];
        }
        echo json_encode($data);
    }

    public function saveRequest(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'client_name' => 'required',
            // 'pickup_from' => 'required',
            'pickup_client' => 'required',
            'pickup_add_1' => 'required',
            'pickup_add_2' => '',
            'pickup_add_3' => '', 
            'pickup_pin' => 'required',
            'pickup_state' => 'required',
            'pickup_country' => 'required',
            'pickup_location' => 'required',
            'pickup_email' => 'required|email:rfc,dns',
            'pickup_phone' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'delivery_client' => 'required',
            // 'delivered_to' => 'required',
            'delivery_add_1' => 'required',
            'delivery_add_2' => '',
            'delivery_add_3' => '',
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
        // $logistic_lead->pickup_from = $data['pickup_from'];
        $logistic_lead->pickup_client = $data['pickup_client'];
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
        $logistic_lead->delivery_client = $data['delivery_client'];
        // $logistic_lead->delivered_to = $data['delivered_to'];
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
        $lead = LogisticLead::leftjoin('logistic_leads_quotations','logistic_leads.id','=','logistic_leads_quotations.lead_id')
                                ->where('logistic_leads.id',$lead_id)
                                ->select('logistic_leads.*',
                                        'logistic_leads_quotations.quotation_id')
                                ->first();
        $lead_products = LogisticLeadsProduct::where('lead_id', $lead->unique_id)
                                            ->get();
        return view('frontend.admin.logisticManagement.logistic_crm.viewLead',['lead' => $lead, 'lead_products' => $lead_products]);
    }

    public function updateRequest(Request $request, $lead_id)
    {
        
        $data = $request->validate([
            'client_name' => 'required',
            'contact_name' => 'required',
            'contact_phone' => 'required|numeric',
            'pickup_client' => 'required',
            'pickup_email' => 'required|email:rfc,dns',
            'pickup_phone' => 'required',
            // 'pickup_from' => '',
            'pickup_add_1' => 'required',
            'pickup_add_2' => '',
            'pickup_add_3' => '',
            'pickup_pin' => 'required',
            'pickup_state' => 'required',
            'pickup_country' => 'required',   
            'pickup_location' => '',
            // 'delivered_to' => '',
            'delivery_client' => 'required',
            'delivery_location' => '',
            'delivery_phone' => 'required|numeric',
            'delivery_add_1' => 'required',
            'delivery_add_2' => '',
            'delivery_add_3' => '',
            'delivery_pin' => 'required',
            'delivery_state' => 'required',
            'delivery_country' => 'required',
            'delivery_email' => 'required|email:rfc,dns',       
        ]);
        $logistic_lead = LogisticLead::findOrFail($lead_id);
        $logistic_lead->client_name = $data['client_name'];
        $logistic_lead->contact_name = $data['contact_name'];
        $logistic_lead->contact_phone = $data['contact_phone'];
        // $logistic_lead->pickup_from = $data['pickup_from'];
        $logistic_lead->pickup_client = $data['pickup_client'];
        $logistic_lead->pickup_add_1 = $data['pickup_add_1'];
        $logistic_lead->pickup_add_2 = $data['pickup_add_2'];
        $logistic_lead->pickup_add_3 = $data['pickup_add_3'];
        $logistic_lead->pickup_pin = $data['pickup_pin'];
        $logistic_lead->pickup_state = $data['pickup_state'];
        $logistic_lead->pickup_country = $data['pickup_country'];
        $logistic_lead->pickup_email = $data['pickup_email'];
        $logistic_lead->pickup_phone = $data['pickup_phone'];
        $logistic_lead->pickup_location = $data['pickup_location'];
        $logistic_lead->delivery_client = $data['delivery_client'];
        // $logistic_lead->delivered_to = $data['delivered_to'];
        $logistic_lead->delivery_location = $data['delivery_location'];
        $logistic_lead->delivery_phone = $data['delivery_phone'];
        $logistic_lead->delivery_add_1 = $data['delivery_add_1'];
        $logistic_lead->delivery_add_2 = $data['delivery_add_2'];
        $logistic_lead->delivery_add_3 = $data['delivery_add_3'];
        $logistic_lead->delivery_pin = $data['delivery_pin'];
        $logistic_lead->delivery_state = $data['delivery_state'];
        $logistic_lead->delivery_country = $data['delivery_country'];
        $logistic_lead->delivery_location = $data['delivery_location'];
        $logistic_lead->delivery_email = $data['delivery_email'];
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

    public function saveQuotation(Request $request,$lead_id)
    {

        $quotation_unique_id = LogisticLeadsQuotation::orderBy('id', 'desc')->first();       
        if ($quotation_unique_id) {
            $number = str_replace('MHLQ', '', $quotation_unique_id->quotation_id);
        } else {
            $number = 0;
        }
        if ($number == 0 || $number == "") {
            $number = 'MHLQ000001';
        } else {
            $number = 'MHLQ' . sprintf('%06d', $number + 1);
        }

        $tax = $request->tax;
        $tax_arr = [];

        foreach ($tax as $t) 
        {
            $val = json_decode($t)->id;
            array_push($tax_arr, $val);
        }
        
        $quotation = new LogisticLeadsQuotation;
        $quotation->lead_id = $request->leads_id;
        $quotation->gst_treatment = $request->gst_treatment;
        $quotation->expiration = $request->expiration;
        $quotation->quotation_template = $request->quotation_template;
        $quotation->payment_terms = $request->payment_terms;
        $quotation->product = $request->product_name;
        $quotation->description = $request->description;
        $quotation->quantity = $request->quantity;
        $quotation->unit_price = $request->unitPrice;
        $quotation->tax = json_encode($tax_arr);
        $quotation->total_price = $request->total;
        $quotation->quotation_id = $number;
        $quotation->save();

        return redirect('admin/logistic/viewrequest/'.$lead_id);
    }
}
