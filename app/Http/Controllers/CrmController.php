<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Stage;
use App\Models\Tag;
use App\Models\User;
use App\Models\CountryCode;
use App\Models\Quotation;


class CrmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getRequest()
    {
        $stage = Stage::get();
        $lead = Lead::get();
        $countryCodes = CountryCode::get();
        $path = 'client';
        return view('frontend.admin.crm.index',['stage' => $stage,'lead' => $lead, 'countryCodes' => $countryCodes, 'path' => $path]);
    }

    public function addRequest()
    { 
        return view('frontend.admin.crm.addrequest');   
    }

    public function searchRequest(Request $request)
    {
       
        $client = User::where('role_id', '=',2)
                        ->where('firstname', 'LIKE', '%'.$request->term.'%')
                        ->get();
        if ($client->count() > 0) {
            foreach ($client as $item) {
                $data[] = [
                    'label' => $item->firstname.' '.$item->lastname,
                    'id' => $item->id,
                    'email' => $item->email,
                    'phone' => $item->phone,
                    'opportunity' => $item->firstname.'\'s opportunity'
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
            'client_name' => 'required',
            'email' => 'email:rfc,dns',
            'mobile_no' => 'numeric',
            'expected_price' => 'numeric',
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
        $lead->client_id = $request->client_id;
        $lead->opportunity = $request->opportunity;
        $lead->email = $request->email;
        $lead->mobile_no = $request->mobile_no;
        $lead->expected_price = $request->expected_price;   
        $lead->stage_id = 1;   
        $lead->save();

        return redirect(route('getRequest'));
    }

    public function viewRequest($lead_id)
    { 
        // $lead = Lead::findOrFail($lead_id);
        $lead = Lead::leftjoin('users', 'leads.client_id', '=', 'users.id')
                    ->where('leads.id', $lead_id)
                    ->select('leads.*', 'users.address', 'users.state', 'users.zipcode', 'users.country')
                    ->first();
        $tag = Tag::get();
        $stage = Stage::get();
        $quotation_count = Quotation::where('leads_id', '=' , $lead_id)->get()->count();
        $selected_tags = json_decode($lead->tag);
        $selected_tags_name = [];
        if(isset($selected_tags)){
            foreach($tag as $t){
                if(in_array($t->id,$selected_tags)){
                    array_push($selected_tags_name, $t->tag_name);
                }
            }
        }
        return view('frontend.admin.crm.viewrequest',['lead' => $lead, 'tag' => $tag, 'stage' => $stage,
                    'selected_tags' => $selected_tags, 'selected_tags_name' => $selected_tags_name,'quotation_count' => $quotation_count]);   
    }

    public function updateStage($lead_id, $stage_id)
    {
        $lead = Lead::findOrFail($lead_id);
        $lead->stage_id = $stage_id;
        $lead->save();
        return redirect()->back();
    }

    public function updateRequest(Request $request)
    {
        $data = $request->validate([
            'client_name' => 'required',
            'email' => 'email:rfc,dns',
            'mobile_no' => 'numeric',
            'expected_price' => 'numeric',
            'probability' => 'numeric',
            'priority' => '',
        ]);

        $id = $request->id;
        $lead = Lead::findOrFail($id);

        $lead->client_name = $request->client_name;
        $lead->opportunity = $request->opportunity;
        $lead->email = $request->email;
        $lead->mobile_no = $request->mobile_no;
        $lead->expected_price = $request->expected_price;   
        $lead->probability = $request->probability;   
        $lead->priority = $request->priority;   
        $lead->expected_closing = $request->expected_closing; 
        $lead->tag = json_encode($request->tag);  
        $lead->save();

        $user = User::findOrFail($lead->client_id);
        $user->address = $request->address;
        $user->state = $request->state;
        $user->zipcode = $request->zipcode;
        $user->country = $request->country;
        $user->save();

        return redirect()->back();
    }

}
