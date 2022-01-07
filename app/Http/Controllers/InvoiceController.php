<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GST;
use App\Models\InvoicePriceBreakups;
use App\Models\LogisticLead;
use App\Models\LogisticLeadInvoice;
use App\Models\LogisticLeadSalesPerson;
use App\Models\LogisticLeadsQuotation;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Tax;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    public function createInvoice(Request $request, $lead_id)
    {
        $data = $request->validate([
            'invoice_type' => 'required',
        ]);
        if($request->invoice_type != 'regular')
        {
            $request->validate([
                'down_payment' => 'required',
            ]);
        }
        $unique_id = LogisticLeadInvoice::orderBy('id', 'desc')->first();
        if ($unique_id) {
            $number = str_replace('MHI', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0 || $number == "") {
            $number = 'MHI000001';
        } else {
            $number = 'MHI' . sprintf('%06d', $number + 1);
        }

        $today = date('Y-m-d');
        $invoice = new LogisticLeadInvoice;
        $invoice->logistic_lead_id = $lead_id;
        $invoice->unique_id = $number;
        $invoice->invoice_type = $request->invoice_type;
        $invoice->down_payment = $request->down_payment;
        $invoice->invoice_date = $today;
        $invoice->due_date = $today;
        $invoice->save();
        return redirect()->route('showInvoice', ['lead_id' => $lead_id])->with('success', 'Invoice has been created !');
    }

    public function showInvoice($lead_id)
    {
        $invoice = LogisticLeadInvoice::where('logistic_lead_id', $lead_id)
                                        ->first();
        $quotations = LogisticLeadsQuotation::leftjoin('gst', 'gst.id', '=', 'logistic_leads_quotations.gst_treatment')
                                            ->where('lead_id', $lead_id)
                                            ->select('logistic_leads_quotations.*',
                                                    'gst.gst_treatment')
                                            ->get();
        $tax = Tax::get();
        foreach ($quotations as $q) {
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

        if(isset($invoice->quotation_reference))
        {
            $quotation_details =  LogisticLeadsQuotation::leftjoin('gst', 'gst.id', '=', 'logistic_leads_quotations.gst_treatment')
                                                        ->where('quotation_id', $invoice->quotation_reference)
                                                        ->select('logistic_leads_quotations.*',
                                                                'gst.gst_treatment')
                                                        ->first();
            if(isset($quotation_details))
            {
                $selected_taxs = json_decode($quotation_details->tax);
                $selected_taxs_name = [];
                if(isset($selected_taxs)){
                    foreach($tax as $t){
                        if(in_array($t->id,$selected_taxs)){
                            array_push($selected_taxs_name, $t->tax_name);
                        }
                    }
                    // selected_taxs_name not present in table, added selected_taxs_name only to show in view.
                    $quotation_details->selected_taxs_name = implode(',', $selected_taxs_name);
                }
            }
            
            $invoice_price_breakups = InvoicePriceBreakups::where('invoice_id','=',$invoice->unique_id)
                                                            ->get();
        }
        else {
            $quotation_details = null;
            $invoice_price_breakups = null;
        }

        if($invoice->invoice_type == 'down_payment_percentage')
        {
            $price_breakup_loops = 100 / intval($invoice->down_payment);
            $invoice->price_breakup_loops = intval($price_breakup_loops);
        }
        else
        {
            $invoice->price_breakup_loops = 0;
        }

        $lead = LogisticLead::where('logistic_leads.id', $lead_id)
                            ->first();
        return view('frontend.admin.logisticManagement.invoice.index',['invoice' => $invoice,
                                                                        'lead' => $lead,
                                                                        'quotation_details' => $quotation_details,
                                                                        'invoice_price_breakups' => $invoice_price_breakups,
                                                                        'quotations' => $quotations,
                                                                    ]);
    }

    public function confirmInvoice(Request $request, $lead_id)
    {
        $invoice = LogisticLeadInvoice::where('logistic_lead_id', $lead_id)
                                        ->first();
        $invoice->quotation_reference = $request->quotation_reference;
        $invoice->save();

        if($invoice->invoice_type == 'down_payment_percentage')
        {
            for ($i=1; $i <= intval($request->price_breakup_loop); $i++) { 
                $breakups = new InvoicePriceBreakups;
                $breakups->invoice_id = $invoice->unique_id;
                $breakups->breakup_type = 'Installment '.$i;
                $breakups->breakup_amount = $request->price_breakup_percentage_input;
                $breakups->is_paid = 0;
                $breakups->save();
            }
        }
        elseif($invoice->invoice_type == 'down_payment_amount')
        {
            $breakups = new InvoicePriceBreakups;
            $breakups->invoice_id = $invoice->unique_id;
            $breakups->breakup_type = 'Downpayment';
            $breakups->breakup_amount = $request->price_breakup_amount_input;
            $breakups->is_paid = 0;
            $breakups->save();

            $breakups = new InvoicePriceBreakups;
            $breakups->invoice_id = $invoice->unique_id;
            $breakups->breakup_type = 'Remaining';
            $breakups->breakup_amount = $request->remaining_price_input;
            $breakups->is_paid = 0;
            $breakups->save();
        }
        else
        {
            $breakups = new InvoicePriceBreakups;
            $breakups->invoice_id = $invoice->unique_id;
            $breakups->breakup_type = 'Amount';
            $breakups->breakup_amount = $request->regular_amount_input;
            $breakups->is_paid = 0;
            $breakups->save();
        }
        
      
        return redirect()->route('showInvoice', ['lead_id' => $lead_id])->with('success', 'Invoice has been confirmed !');
    }

    public function paymentReceived($lead_id)
    {
        $invoice = LogisticLeadInvoice::where('logistic_lead_id', $lead_id)
                                        ->first();
        $breakups_price = InvoicePriceBreakups::where('invoice_id','=',$invoice->unique_id)
                                                ->where('is_paid', 0)
                                                ->get();
        return view('frontend.admin.logisticManagement.invoice.paymentReceived', ['breakups_price' => $breakups_price, 'lead_id' => $lead_id]);
    }

    public function savePaymentReceived(Request $request, $lead_id)
    {
        $invoice = LogisticLeadInvoice::where('logistic_lead_id', $lead_id)
                                        ->first();
        $breakups_price = InvoicePriceBreakups::where('invoice_id','=',$invoice->unique_id)
                                                ->get();

        $data = $request->validate([
                'paymentAmount' => 'required',
                'payment_type' => 'required'
        ]);

        if($request->payment_type == 'dd')
        {
            $request->validate([
                'dd_no' => 'required',
                'dd_date' => 'required',
                'dd_amount' => 'required'
            ]);

            foreach ($request->paymentAmount as $breakup_id) {
                $invoice_price_breakup = InvoicePriceBreakups::findOrFail($breakup_id);
                $invoice_price_breakup->is_paid = 1;
                $invoice_price_breakup->save();

                $payment = new Payment;
                $payment->breakup_price_id = $breakup_id;
                $payment->payment_type = $request->payment_type;
                $payment->amount = $invoice_price_breakup->breakup_amount;
                $payment->dd_no = $request->dd_no;
                $payment->dd_date = $request->dd_date;
                $payment->save();
            }
        }
        elseif($request->payment_type == 'checque')
        {
            $request->validate([
                'checq_no' => 'required',
                'checq_date' => 'required',
                'bank_name' => 'required',
                'checq_amount' => 'required'
            ]);

            foreach ($request->paymentAmount as $breakup_id) {
                $invoice_price_breakup = InvoicePriceBreakups::findOrFail($breakup_id);
                $invoice_price_breakup->is_paid = 1;
                $invoice_price_breakup->save();

                $payment = new Payment;
                $payment->breakup_price_id = $breakup_id;
                $payment->payment_type = $request->payment_type;
                $payment->amount = $invoice_price_breakup->breakup_amount;
                $payment->checq_no = $request->checq_no;
                $payment->checq_date = $request->checq_date;
                $payment->bank_name = $request->bank_name;
                $payment->save();
            }
        }
        elseif($request->payment_type == 'online')
        {
            $request->validate([
                'online_date' => 'required',
                'transaction_no' => 'required',
                'online_amount' => 'required'
            ]);

            foreach ($request->paymentAmount as $breakup_id) {
                $invoice_price_breakup = InvoicePriceBreakups::findOrFail($breakup_id);
                $invoice_price_breakup->is_paid = 1;
                $invoice_price_breakup->save();

                $payment = new Payment;
                $payment->breakup_price_id = $breakup_id;
                $payment->payment_type = $request->payment_type;
                $payment->amount = $invoice_price_breakup->breakup_amount;
                $payment->online_date = $request->online_date;
                $payment->transaction_no = $request->transaction_no;
                $payment->save();
            }
        }
        else
        {
            foreach ($request->paymentAmount as $breakup_id) {
                $invoice_price_breakup = InvoicePriceBreakups::findOrFail($breakup_id);
                $invoice_price_breakup->is_paid = 1;
                $invoice_price_breakup->save();

                $payment = new Payment;
                $payment->breakup_price_id = $breakup_id;
                $payment->payment_type = $request->payment_type;
                $payment->amount = $invoice_price_breakup->breakup_amount;
                $payment->save();
            }
        }
        
        return redirect()->route('showInvoice', ['lead_id' => $lead_id])->with('success','Payment has been received !');
    }
}
