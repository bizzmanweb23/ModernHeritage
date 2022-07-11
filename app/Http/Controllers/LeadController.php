<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class LeadController extends Controller
{
    //
    public function leadsManagement()
    {
        $data['data'] = DB::table('leads_management')->get();
        return view('frontend.admin.leads.index', $data);
    }
    public function leadView($id)
    {
        $data['data'] = DB::table('leads_management')->where('id', $id)->first();
        return view('frontend.admin.leads.view', $data);
    }
    public function searchVisitor(Request $request)
    {
       $data['data'] = DB::table('leads_management')->whereBetween('created_at', [$request->start_date, $request->end_date])->get();
       return view('frontend.admin.leads.index', $data);
    }
    }

