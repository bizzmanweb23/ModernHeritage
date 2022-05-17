<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ColorController extends Controller
{
    //
    public function index(Request $request)
    {
        $data_c=DB::table('colors');
        if(isset($request->status))
        {
            if($request->status!='all')
            {
                $data['data']=$data_c->where('hex',$request->status)->get();
            }
            else
            {
                $data['data']=$data_c->get();
            }
           
        }
        else
        {
            $data['data']=$data_c->get();
        }
        return view('frontend.admin.colors.index',$data);
    }
    public function addcolors()
    {
        return view('frontend.admin.colors.create');
    }

    public function savecolors(Request $request)
    {
            DB::table('colors')->insert([
               'name'=>$request->color_name,
               'hex'=>$request->status
            ]);
            return redirect(route('colors'))->with('message','Colors Created Successfully');  
    }

    public function editcolors($id)
    {
  
     $data['data']=DB::table('colors')->where('id',$id)->first();
     return view('frontend.admin.colors.edit',$data);
    }
    public function  updatecolors(Request $request)
    {
        DB::table('colors')->where('id',$request->id)->update([
            'name'=>$request->color_name,
            'hex'=>$request->status
         ]);
         return redirect(route('colors'))->with('message','Colors Updated Successfully');  
    }
    public function deletecolor(Request $request)
    {
        DB::table('colors')->where('id',$request->id)->delete();
        return json_encode(1);
    }
}
