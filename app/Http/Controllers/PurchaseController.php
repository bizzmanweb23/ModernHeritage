<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use DB;


class PurchaseController extends Controller
{
    public function allpurchase(Request $request)
    {
        $purchase['purchase']=Purchase::all();
        if(isset($request->month))
        { if($request->month!='all')
            {
                $expense['purchase']=Purchase::whereMonth('date',$request->month)->get();
            }
         else{
            $purchase['purchase']=Purchase::all();
         }
     
        }
        else
        {      $purchase['purchase']=Purchase::all();

        }
        return view('frontend.admin.purchase.index',$purchase);
    }

    
    public function addPurchase()
    {
        return view('frontend.admin.purchase.addPurchase');
    }

    public function savePurchase(Request $request)
    {
        DB::table('purchases')->insert([
            'date' => $request->date,
            'supplier_name' => $request->supplier_name,
            'purchase_invoice' => $request->purchase_invoice,
        ]);
        return redirect(route('allPurchase'));
    }
    public function deletePurchase(Request $request)
    {
        DB::table('purchases')->where('id',$request->id)->delete();
        return json_encode(1);
    }
}
