<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Stage;

class CrmController extends Controller
{
    public function getRequest()
    {
        $stage = Stage::get();
        $lead = Lead::get();
        return view('frontend.admin.crm.index',['stage' => $stage,'lead' => $lead]);
    }

    public function addRequest()
    { 
        return view('frontend.admin.crm.addrequest');   
    }

    public function saveRequest(Request $request)
    {       
        $data = $request->validate([
            'client_name' => 'required',
            
        ]);
        // $unique_id = CRM::orderBy('id', 'desc')->first();
        // if($unique_id)
        // {
        //     $number = str_replace('SR', '', $unique_id->unique_id);
        // }
        // else
        // {
        //     $number = 0;
        // }
        // if ($number == 0) {
        //     $number = 'SR00001';
        // } else {
        //     $number = "SR" . sprintf("%05d", $number + 1);
        // }

        $lead = new Lead;
        $lead->client_name = $data['client_name'];
        $lead->opportunity = $request->opportunity;
        $lead->email = $request->email;
        $lead->mobile_no = $request->mobile_no;
        $lead->expected_price = $request->expected_price;   
        $lead->stage_id = 1;   
        $lead->save();

        return redirect(route('getRequest'));
    }

}
