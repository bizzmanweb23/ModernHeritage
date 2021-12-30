<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\GST;
use App\Models\LogisticLead;
use App\Models\LogisticLeadInvoice;
use App\Models\LogisticLeadSalesPerson;
use App\Models\LogisticLeadsQuotation;
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
        return redirect(route('showInvoice', ['lead_id' => $lead_id]));
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
                    $q->selected_taxs_name = $selected_taxs_name;
                }
            }
            if($invoice->invoice_type == 'down_payment_percentage')
            {
                $price_breakup_loops = 100 / intval($invoice->down_payment);
                $invoice->price_breakup_loops = intval($price_breakup_loops);
                $quotation_details->breakup_price = round(floatval($quotation_details->total_price / intval($price_breakup_loops)),2);
            }
            else
            {
                $invoice->price_breakup_loops = 0;
                $quotation_details->breakup_price = floatval($quotation_details->total_price - $invoice->down_payment);
            }
        }
        else {
            $quotation_details = null;
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
                                                                        'quotations' => $quotations,
                                                                    ]);
    }

    public function confirmInvoice(Request $request, $lead_id)
    {
        $invoice = LogisticLeadInvoice::where('logistic_lead_id', $lead_id)
                                        ->first();
        $invoice->quotation_reference = $request->quotation_reference;
        $invoice->save();

        return redirect(route('showInvoice', ['lead_id' => $lead_id]));
    }
}
