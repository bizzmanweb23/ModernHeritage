<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\CountryCode;
use App\Models\LogisticStage;
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
        //$lead = Lead::get();
        //$countryCodes = CountryCode::get();
        //$path = 'client';
        return view('frontend.admin.logisticManagement.logistic_crm.index',['logistic_stage' => $logistic_stage]);
    }

    public function addRequest()
    {
        return view('frontend.admin.logisticManagement.logistic_crm.addLead');
    }
}