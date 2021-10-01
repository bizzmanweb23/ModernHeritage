<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Stage;
use App\Models\Tag;
use App\Models\Client;

class QuotationController extends Controller
{
    public function addQuotation($id)
    { 
        $lead = Lead::findOrFail($id);
        return view('frontend.admin.quotation.addQuotation',['lead' => $lead]);   
    }
}
