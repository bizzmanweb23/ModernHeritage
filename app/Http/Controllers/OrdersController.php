<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProducts;
use DB;


class OrdersController extends Controller
{
    //
    public function index()
    {
        $orders['orders']=Order::select('orders.*','order_status.order_status')->join('order_status','order_status.id','orders.order_status')->get();
        return view('frontend.admin.orders.index',$orders);
    }

    public function orderDetails($id)
    {
        $data['data'] = Order::select('orders.*','order_status.order_status')->where('orders.id',$id)->join('order_status','order_status.id','orders.order_status')->first();
        $data['order_products'] = OrderProducts::where('order_id',$id)->get();
        $data['order_status']=DB::table('order_status')->where('status',1)->get();
        return view('frontend.admin.orders.order_details',$data);
   
    }
    public function orderStatus()
    {
        $data['data']=DB::table('order_status')->get();
        return view('frontend.admin.order_status.index',$data);
   
    }

    public function addOrderStatus()
    {
      
        return view('frontend.admin.order_status.add');
    }
    public function saveOrderStatus(Request $request)
    {
          DB::table('order_status')->insert([
              'order_status'=>$request->order_status,
              'status'=>1
          ]);
          return redirect(route('orderStatus'))->with('message','Order Status inserted successfully');
    }
    public function  editStatus($id)
    {
        $data['data']=DB::table('order_status')->where('id',$id)->first();
        return view('frontend.admin.order_status.edit',$data);
    }
    public function  editOrderStatus(Request $request)
    {
        DB::table('order_status')->where('id',$request->id)->update([
            'order_status'=>$request->order_status,
            'status'=>$request->status
        ]);
        return redirect(route('orderStatus'))->with('message','Order Status updated successfully');
    }
    public function  deleteStatus(Request $request)
    {
        DB::table('order_status')->where('id',$request->id)->delete();
        return redirect(route('orderStatus'))->with('message','Order Status deleted successfully');
       
    }
    public function orderStatusEdit($id)
    {
       $data['data']= DB::table('order_status')->where('id',$id)->first();
        return view('frontend.admin.order_status.edit',$data);
    }
    public function orderUpdate(Request $request)
    {
        DB::table('orders')->where('id',$request->id)->update([
            'order_status'=>$request->order_status,
       
        ]);
        return redirect(route('orderList'))->with('message','Order Status updated successfully');
    }
    public function assign_to_delivery($id)
    {
        $data['data'] = Order::select('orders.*')->where('orders.id',$id)->first();
        return view('frontend.admin.orders.assign_to_delivery',$data);
    }
}
