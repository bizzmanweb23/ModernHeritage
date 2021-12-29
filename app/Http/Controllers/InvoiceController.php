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
        $quotation = LogisticLeadsQuotation::where('lead_id', $lead_id)->first();
        $invoice = new LogisticLeadInvoice;
        $invoice->logistic_lead_id = $lead_id;
        $invoice->unique_id = $number;
        $invoice->invoice_type = $request->invoice_type;
        $invoice->down_payment = $request->down_payment;
        $invoice->quotation_reference = $quotation->quotation_id;
        $invoice->invoice_date = $today;
        $invoice->due_date = $today;
        $invoice->save();
        return redirect(route('showInvoice', ['lead_id' => $lead_id]));
    }

    public function showInvoice($lead_id)
    {
        $invoice = LogisticLeadInvoice::leftjoin('logistic_leads_quotations', 'logistic_leads_quotations.quotation_id', '=', 'logistic_leads_invoices.quotation_reference')
                                        ->leftjoin('gst', 'gst.id', '=', 'logistic_leads_quotations.gst_treatment')
                                        ->where('logistic_leads_invoices.logistic_lead_id', $lead_id)
                                        ->select('logistic_leads_invoices.unique_id as invoice_id',
                                                'logistic_leads_invoices.invoice_type',
                                                'logistic_leads_invoices.invoice_date',
                                                'logistic_leads_invoices.due_date',
                                                'logistic_leads_quotations.*',
                                                'gst.gst_treatment as gst_treatment')
                                        ->first();
        $lead = LogisticLead::where('logistic_leads.id', $lead_id)
                            ->first();
        // $gst = GST::get();
        $tax = Tax::get();
        $services = Service::get();
        return view('frontend.admin.logisticManagement.invoice.index',['invoice' => $invoice,
                                                                        'lead' => $lead,
                                                                        'tax' => $tax,
                                                                        'services' => $services,
                                                                    ]);
    }
}
