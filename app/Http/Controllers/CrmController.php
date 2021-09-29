<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Models\CRM;
use App\Models\Stage;

class CrmController extends Controller
{
    public function getRequest()
    {
        $stage = Stage::get();
        return view('frontend.admin.crm.index',['stage' => $stage]);
    }

    // public function addRequest()
    // { 
    //     return view('frontend.admin.crm.addrequest');   
    // }

    // public function saveRequest(Request $request)
    // {       
    //     $data = $request->validate([
    //         'customer_name' => 'required',
            
    //     ]);
    //     $unique_id = CRM::orderBy('id', 'desc')->first();
    //     if($unique_id)
    //     {
    //         $number = str_replace('SR', '', $unique_id->unique_id);
    //     }
    //     else
    //     {
    //         $number = 0;
    //     }
    //     if ($number == 0) {
    //         $number = 'SR00001';
    //     } else {
    //         $number = "SR" . sprintf("%05d", $number + 1);
    //     }

    //     $crm = new CRM;
    //     $crm->unique_id = $number;
    //     $crm->coustomer_name = $data['coustomer_name'];
    //     $crm->address = $data['address'];
    //     $crm->service_id = json_encode($request->service);
    //     $crm->status = 1;
    //     $crm->save();

    //     return redirect(route('allVendor'));
    // }

}
