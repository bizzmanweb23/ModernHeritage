<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use App\Models\Employee;
use DB;

class HolidayController extends Controller
{
    //

    public function holidayList(Request $request)
    {

        if (isset($request->year)) {
            if ($request->year != 'all') {
                $data['holidays']  = Holiday::whereYear('start_date', $request->year)->get();
            } else {
                $data['holidays'] = Holiday::all();
            }
        } else {
            $data['holidays'] = Holiday::all();
        }

        return view('frontend.admin.holiday.index', $data);
    }
    public function addHoliday()
    {

        return view('frontend.admin.holiday.add');
    }
    public function  saveHoliday(Request $request)
    {
        $request->validate([
            'end_date' => 'date|after:start_date'
        ]);


        $holiday = new Holiday;
        $holiday->holiday = $request->holiday;
        $holiday->start_date    = $request->start_date;
        $holiday->end_date = $request->end_date;
        $holiday->status = $request->status;
        $holiday->save();
        return redirect(route('holidayList'))->with('message', 'Holiday Added Successfully');
    }
    public function editHoliday($id)
    {
        $data['holiday'] = Holiday::find($id);
        return view('frontend.admin.holiday.edit', $data);
    }
    public function updateHoliday(Request $request)
    {
        $request->validate([
            'end_date' => 'date|after:start_date'
        ]);

        $holiday = Holiday::find($request->id);
        $holiday->holiday = $request->holiday;
        $holiday->start_date = $request->start_date;
        $holiday->end_date = $request->end_date;
        $holiday->status = $request->status;
        $holiday->save();
        return redirect(route('holidayList'))->with('message', 'Holiday Updated Successfully');
    }
    public function deleteHoliday(Request $request)
    {
        $data = Holiday::where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function leaveStructure()
    {
        $data['data'] = DB::table('leavestructures')->get();
        return view('frontend.admin.holiday.leaveStructure', $data);
    }
    public function addleaveStructure()
    {
        return view('frontend.admin.holiday.addLeave');
    }
    public function addleave(Request $request)
    {
        DB::table('leavestructures')->insert([
            'casual_leave' => $request->casual_leave,
            'sick_leave' => $request->sick_leave
        ]);
        return redirect(route('leaveStructure'));
    }
    public function deleteLeaveStructure(Request $request)
    {

        DB::table('leavestructures')->where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function editLeave($id)
    {
        $data['data'] = DB::table('leavestructures')->where('id', $id)->first();
        return view('frontend.admin.holiday.editLeave', $data);
    }
    public function  updateLeave(Request $request)
    {
        DB::table('leavestructures')->where('id', $request->id)->update([
            'casual_leave' => $request->casual_leave,
            'sick_leave' => $request->sick_leave
        ]);
        return redirect(route('leaveStructure'));
    }
    public function attendanceDetails()
    {
        $data['job_positions'] = DB::table('job_positions')->where('status', 1)->get();

        $data['employees'] = Employee::where('status', 1)->get();

        $data['data'] = DB::table('employee_logins')
            ->select('employee_logins.*', 'employees.unique_id', 'employees.emp_name')
            ->join('employees', 'employees.id', 'employee_logins.emp_id')
            ->get();
        return view('frontend.admin.holiday.attendance', $data);
    }
    public function exportAttendanceSheet(Request $request)
    {
        $fileName = 'attendancesheet.csv';
        $tasks = DB::table('employee_logins')
                    ->select('employee_logins.*', 'employees.unique_id', 'employees.emp_name')
                    ->where('employee_logins.emp_id', $request->emp_id)
                    ->whereMonth('login_date', '=', $request->month)
                    ->join('employees', 'employees.id', 'employee_logins.emp_id')
                    ->get();

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('Employee Id','Employee Name','Login Date / Time', 'Logout Date / Time');

        $callback = function () use ($tasks, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($tasks as $task) {
               
                $row['Employee Id']  = $task->unique_id;
                $row['Employee Name']  = $task->emp_name;
                $row['Login Date / Time']  = $task->login_date;
                $row['Logout Date / Time']  = $task->logout_date;
              

                fputcsv($file, array($row['Employee Id'],$row['Employee Name'],$row['Login Date / Time'], $row['Logout Date / Time']));
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }


    public function getEmployee(Request $request)
    {
         
        $parent_id = $request->deg_id;
         
        $employee =  DB::table('employees')->where('job_position',$parent_id)
                          
                              ->get();
        return response()->json($employee);
    }
    public function status_update_leave(Request $request)
    {
     
       $data = DB::table('employee_leave_models')->where('id',$request->id)->first();
       if($request->type == 1)
       {
        DB::table('employee_leave_models')->where('id',$request->id)->update([
            'status'=>$request->status,
            'casual_leave'=>$data->casual_leave-$request->no_of_day
      ]);
       }
       else{

        DB::table('employee_leave_models')->where('id',$request->id)->update([
            'status'=>$request->status,
            'sick_leave'=>$data->sick_leave-$request->no_of_day
      ]);
       }
       return back();
      
    }
}
