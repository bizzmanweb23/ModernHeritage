<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;
use DB;

class HolidayController extends Controller
{
    //

    public function holidayList(Request $request)
    {
        
        if(isset($request->year))
        {
            if($request->year != 'all')
            {
                $data['holidays']  = Holiday::whereYear('start_date', $request->year)->get();
            }
            else
            {
                $data['holidays'] = Holiday::all();
            }
           
        }
        else{
            $data['holidays'] = Holiday::all();
        }
       
        return view('frontend.admin.holiday.index',$data);
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
       $holiday->start_date	= $request->start_date;
       $holiday->end_date = $request->end_date;
       $holiday->status = $request->status;
       $holiday->save();
       return redirect(route('holidayList'))->with('message','Holiday Added Successfully');
    }
    public function editHoliday($id)
    {
       $data['holiday'] = Holiday::find($id);
        return view('frontend.admin.holiday.edit',$data);
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
        return redirect(route('holidayList'))->with('message','Holiday Updated Successfully');
    }
    public function deleteHoliday(Request $request)
    {
        $data = Holiday::where('id',$request->id)->delete();
        return json_encode(1);
    }
    public function leaveStructure ()
    {
       $data['data'] = DB::table('leavestructures')->get();
        return view('frontend.admin.holiday.leaveStructure',$data);
    }
    public function addleaveStructure()
    {
        return view('frontend.admin.holiday.addLeave');
    }
    public function addleave(Request $request)
    {
        DB::table('leavestructures')->insert([
           'casual_leave'=>$request->casual_leave,
           'sick_leave'=>$request->sick_leave
        ]);
        return redirect(route('leaveStructure'));
    }
    public function deleteLeaveStructure(Request $request)
    {
        
        DB::table('leavestructures')->where('id',$request->id)->delete();
        return json_encode(1);
        
    }
    public function editLeave($id)
    {
       $data['data'] = DB::table('leavestructures')->where('id',$id)->first();
        return view('frontend.admin.holiday.editLeave',$data);
    }
    public function  updateLeave(Request $request)
    {
        DB::table('leavestructures')->where('id',$request->id)->update([
            'casual_leave'=>$request->casual_leave,
            'sick_leave'=>$request->sick_leave
         ]);
         return redirect(route('leaveStructure'));
    }
}
