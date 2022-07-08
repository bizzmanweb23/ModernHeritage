<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use DB;


class ExpenseController extends Controller
{
    public function allExpenses(Request $request)
    {
        $expense['expense']=Expense::all();
        if(isset($request->month))
        { if($request->month!='all')
            {
                $expense['expense']=Expense::whereMonth('date',$request->month)->get();
            }
         else{
            $expense['expense']=Expense::all();
         }
     
        }
        else
        {      $expense['expense']=Expense::all();

        }
        return view('frontend.admin.reports.expense',$expense);
    }

    public function allExpensesReports(Request $request)
    {
        $expense['expense']=Expense::all();
        if(isset($request->year))
        { if($request->year!='all')
            {
                $expense['expense']=Expense::whereYear('date',$request->year)->get();
            }
         else{
            $expense['expense']=Expense::all();
         }
     
        }
        else
        {      $expense['expense']=Expense::all();

        }
        return view('frontend.admin.reports.expenseReports',$expense);
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
    public function allSalesReports(Request $request)
    {
        if(isset($request->year))
        { if($request->year!='all')
            {
                $data['sales']=DB::table('orders')->where('order_status',2)->whereYear('created_at',$request->year)->get();
            }
         else{
            $data['sales']=DB::table('orders')->where('order_status',2)->get();
         }
     
        }
        else
        {       $data['sales']=DB::table('orders')->where('order_status',2)->get();

        }

        return view('frontend.admin.reports.salesReport',$data);
    }
    public function exportSalesReport(Request $request)
    {
        $fileName = 'salesreport.csv';
        $tasks = DB::table('orders')->where('order_status',2)
                    ->whereYear('created_at', '=', $request->year)
                  
                    ->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Date','Customer Name','Customer Email', 'Amount');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
               
                $row['Date']  = $task->created_at;
                $row['Customer Name']  = $task->customer_name;
                $row['Customer Email']  = $task->customer_email;
                $row['Amount']  = $task->order_amount;
              

                fputcsv($file, array($row['Date'],$row['Customer Name'],$row['Customer Email'], $row['Amount']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function exportExpensesReport(Request $request)
    {
        $fileName = 'expensereport.csv';
        $tasks = Expense::whereYear('date',$request->year)->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Date','Details','Payment Mode', 'Amount');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
               
                $row['Date']  = $task->date;
                $row['Details']  = $task->details;
                if($task->payment_mode == 1)
                {
                    $row['Payment Mode']  = 'CASH';
                }
                else
                {
                    $row['Payment Mode']  = 'ONLINE';
                }
              
                $row['Amount']  = $task->expense_amount;
              

                fputcsv($file, array($row['Date'],$row['Details'],$row['Payment Mode'], $row['Amount']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function allClientReports()
    {
        $customers['customers'] = DB::table('customer_management')->get();
        $customers['customers_reports']=DB::table('orders')->where('order_status',2)->get();
        return view('frontend.admin.reports.clientReport',$customers);
    }
    public function  exportCustomerReport(Request $request)
    {
        $fileName = 'customerreport.csv';
        $tasks = DB::table('orders')->where('order_status',2)->where('customer_id',$request->customer_id)->whereYear('created_at',$request->year)->get();
    
        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Date','Customer Name','Customer Email', 'Amount');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
               
                $row['Date']  = $task->created_at;
                $row['Customer Name']  = $task->customer_name;
                $row['Customer Email']  = $task->customer_email;
                $row['Amount']  = $task->order_amount;
              

                fputcsv($file, array($row['Date'],$row['Customer Name'],$row['Customer Email'], $row['Amount']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
    public function kb_articles()
    {
        return view('frontend.admin.reports.kbarticles');
    }

    public function  addArticles()
    {
        return view('frontend.admin.reports.articles');
    }
}
