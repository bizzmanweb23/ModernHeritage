<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\Stage;
use App\Models\Tag;
use App\Models\GST;
use App\Models\User;
use App\Models\Quotation;
use App\Models\Quotation_product;
use App\Models\Product;
use App\Models\Tax;

class QuotationController extends Controller
{
    public function addQuotation($id)
    { 
        $lead = Lead::findOrFail($id);
        $gst = GST::get();
        $tax = Tax::get();
        $product = Product::get();
        return view('frontend.admin.quotation.addQuotation',['lead' => $lead, 'gst' => $gst, 'tax' => $tax, 'product' => $product]);   
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
        $quotation->save();

        $quotation_product = new Quotation_product;
        $quotation_product->quotation_id = $quotation->id;
        $quotation_product->product_id = $request->product_id;
        $quotation_product->quantity = $request->quantity;
        $quotation_product->total = $request->total;
        $quotation_product->save();

        $product = Product::where('unique_id', $request->product_id)
                            ->first();
        $product->available_quantity =  intval($product->available_quantity) - intval($request->quantity);
        $product->save();

        // return redirect()->back();
        return redirect('/viewrequest/'.$request->leads_id);
    }

    public function searchProduct(Request $request)
    {
        $product = Product::where('product_name', 'LIKE', '%'.$request->term.'%')
                            ->get();
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

    // public function addProduct(Request $request)
    // {
    //     $data = $request->validate([
    //         'product_id' => 'required',
            
    //     ]);


    // }
}
