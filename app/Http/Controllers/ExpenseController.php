<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DB;


class ExpenseController extends Controller
{
    public function allExpenses()
    {
        $expense['expense']=Expense::all();
        return view('frontend.admin.reports.expense',$expense);
    }
    public function addExpenses()
    {
        return view('frontend.admin.reports.addExpense');
    }

    public function saveExpenses(Request $request)
    {
        DB::table('expenses')->insert([
            'date' => $request->date,
            'details' => $request->details,
            'payment_mode' => $request->payment_mode,
            'expense_amount'=>$request->expense_amount,
        ]);
        return redirect(route('allExpenses'));
    }
    public function deleteExpense(Request $request)
    {
        DB::table('expenses')->where('id',$request->id)->delete();
        return json_encode(1);
    }
}
