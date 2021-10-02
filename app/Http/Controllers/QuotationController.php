<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Stage;
use App\Models\Tag;
use App\Models\GST;
use App\Models\Client;
use App\Models\Quotation;
use App\Models\Product;
use App\Models\Tax;

class QuotationController extends Controller
{
    public function addQuotation($id)
    { 
        $lead = Lead::findOrFail($id);
        $gst = GST::get();
        $tax = Tax::get();
        return view('frontend.admin.quotation.addQuotation',['lead' => $lead, 'gst' => $gst, 'tax' => $tax]);   
    }

    public function saveQuotation(Request $request)
    {
        $data = $request->validate([
            'client_id' => 'required',
            'leads_id' => 'required',
            
        ]);

        $quotation = new Quotation;
        $quotation->customer_id = $request->client_id;
        $quotation->leads_id = $request->leads_id;
        $quotation->gst_treatment = $request->gst_treatment;
        $quotation->expiration = $request->expiration;
        $quotation->product_id = $request->product_id;
        $quotation->save();

        return redirect()->back();
        //return redirect('/viewrequest/'.$request->leads_id);
    }

    public function searchProduct(Request $request)
    {
       
        $product = Product::get();
        if ($product->count() > 0) {
            foreach ($product as $item) {
                if($item->available_quantity >= 1){
                    $data[] = [
                        'label' => $item->product_name,
                        'id' => $item->id,
                        'description' => $item->description,
                        'available_quantity' => intval($item->available_quantity),
                        'quantity' => 1,
                        'price' => floatval($item->price),
                        'subtotal' => floatval($item->price),
                    ];
                }
            }
        } else {
            $data[] = ['label' => 'Not Found', 'id' => 0];
        }
        echo json_encode($data);
    }
}
