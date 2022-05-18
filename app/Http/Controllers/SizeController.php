<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SizeController extends Controller
{
    //
    public function index(Request $request)
    { 
        $data['data']=DB::table('size')->select('size.*','units.unit')->join('units' ,'units.id' ,'size.unit')->get();

        return view('frontend.admin.sizes.index',$data);
    }
    public function addSizes()
    {
        $data['units']=DB::table('units')->get();
        return view('frontend.admin.sizes.create',$data);
    }
    public function saveSize(Request $request)
    {
        DB::table('size')->insert([
            'height'=>$request->height,
            'width'=>$request->width,
            'status'=>$request->status,
            'unit'=>$request->unit
         ]);
         return redirect(route('sizes'))->with('message','Size Created Successfully');  
    }
    public function editSize($id)
    {
        $data['units']=DB::table('units')->get();
        $data['data']=DB::table('size')->where('id',$id)->first();
        return view('frontend.admin.sizes.edit',$data);
    }
    public function updateSize(Request $request)
    {
        DB::table('size')->where('id',$request->id)->update([
            'height'=>$request->height,
            'width'=>$request->width,
            'status'=>$request->status,
            'unit'=>$request->unit
         ]);
         return redirect(route('sizes'))->with('message','Size Updated Successfully');  
    }
    public function deleteSize(Request $request)
    {
        DB::table('size')->where('id',$request->id)->delete();
        return json_encode(1);
    }
}
