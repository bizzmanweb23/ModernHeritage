<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LogisticLeadSalesPerson;
use Illuminate\Http\Request;


class SalesController extends Controller
{
    public function allSalesperson()
    {
        $salesPersons = Employee::where('job_position','=','8')->get();
        return view('frontend.admin.salesManagement.allSalesPerson',['salesPersons' => $salesPersons]);
    }

    public function assignedLeads($salesperson_id)
    {
        $assigned_leads = LogisticLeadSalesPerson::leftjoin('logistic_leads','logistic_leads_salespersons.logistic_lead_id','=','logistic_leads.id')
                                                   ->where('sale_person_id', '=', $salesperson_id)
                                                   ->select('logistic_leads.*')
                                                    ->get();
        return view('frontend.admin.salesManagement.assignedLeads',['assigned_leads' => $assigned_leads]);
    }
}
