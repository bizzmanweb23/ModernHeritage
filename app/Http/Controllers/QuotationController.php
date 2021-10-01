<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function addQuotation()
    { 
        return view('frontend.admin.quotation.addQuotation');   
    }
}
