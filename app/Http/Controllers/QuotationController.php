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
       
        $tax = $request->tax;
        $tax_arr = [];

        foreach ($tax as $t) 
        {
            $val = json_decode($t)->id;
            array_push($tax_arr, $val);
        }

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
        $quotation_product->tax = json_encode($tax_arr);
        $quotation_product->save();

        $product = Product::where('unique_id', $request->product_id)
                            ->first();
        $product->available_quantity =  intval($product->available_quantity) - intval($request->quantity);
        $product->save();

        // return redirect()->back();
        return redirect('/confirmquotation/'.$quotation->id);
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

    public function confirmQuotation($id)
    {
        $quotation_id = $id;
        $gst = GST::get();
        $tax = Tax::get();
        $quotation = Quotation::leftjoin('leads','quotations.leads_id', '=' , 'leads.id')
                                    ->leftjoin('gst', 'quotations.gst_treatment', '=', 'gst.id')
                                    ->where('quotations.id',$quotation_id)
                                    ->select('quotations.*',
                                            'gst.gst_treatment as gst_treatment_name',
                                            'leads.stage_id',
                                            'leads.client_id',
                                            'leads.client_name',
                                            'leads.opportunity',
                                            'leads.email',
                                            'leads.mobile_no',
                                            'leads.expected_price',
                                            'leads.probability',
                                            'leads.tag',
                                            'leads.expected_closing',
                                        )
                                    ->first();

        $quotation_product = Quotation_product::leftjoin('products',  'quotation_products.product_id', '=', 'products.unique_id')
                                                ->where('quotation_products.quotation_id',$quotation_id)
                                                ->get(['quotation_products.*',
                                                        'products.product_name',
                                                        'products.price',
                                                        'products.description'
                                                ]);
        foreach ($quotation_product as $q) {
            $selected_taxs = json_decode($q->tax);
            $selected_taxs_name = [];
            if(isset($selected_taxs)){
                foreach($tax as $t){
                    if(in_array($t->id,$selected_taxs)){
                        array_push($selected_taxs_name, $t->tax_name);
                    }
                }
                // selected_taxs_name not present in table, added selected_taxs_name only to show in view.
                $q->selected_taxs_name = $selected_taxs_name;
            }
        }

        return view('frontend.admin.quotation.confirmquotation', ['quotation' => $quotation,
                                                                    'quotation_product' => $quotation_product,
                                                                    'gst' => $gst,
                                                                    'tax' => $tax,
                                                            ]);    
    } 

    public function postConfirmQuotation($id)
    {
        $quotation_id = $id;
        $sales_id = "S" . sprintf("%05d", $quotation_id);
        
        $quotation = Quotation::findOrFail($quotation_id);
        $quotation->sales_id = $sales_id;
        $quotation->save();

        return redirect('/confirmquotation/'.$quotation_id);
    }
}
