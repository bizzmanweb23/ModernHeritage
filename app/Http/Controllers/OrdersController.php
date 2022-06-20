<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Vehicle;
use App\Models\Employee;
use App\Models\LogisticDashboard;
use Calendar;
use DB;


class OrdersController extends Controller
{
    //
   
    public function index(Request $request)
    {
        $data = Order::select('orders.*','order_status.order_status as ordStatus')->join('order_status','order_status.id','orders.order_status');

        if(isset($request->order_status))
        {
            if($request->order_status!='all')
            {
                $orders['orders'] = $data->where('orders.order_status',$request->order_status)->get();
            }
            else
            {
                $orders['orders'] = $data->get();
            }
         
        }
        else
        {
            $orders['orders'] = $data->get();
        }

    
        $orders['order_status']= DB::table('order_status')->where('status',1)->get();
        return view('frontend.admin.orders.index',$orders);
    }

    public function orderDetails($id)
    {
        $data['data'] = Order::select('orders.*','order_status.order_status')->where('orders.id',$id)->join('order_status','order_status.id','orders.order_status')->first();
        $data['order_products'] = OrderProducts::where('order_id',$id)->get();
        $data['order_status']=DB::table('order_status')->where('status',1)->get();
        $other_details=DB::table('collection')->where('order_id',$id)->first();
        $data['vehicles']=DB::table('vehicles')->where('driver_id',$other_details->driver_id)->first();
        $data['other_details'] = $other_details;
    
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
        $data['admin']=DB::table('users')->select('users.user_name','users.email','user_address.*')->where('user_name','Admin')->join('user_address','user_address.user_id','user_address.id')->first();
        $data['countries'] = DB::table('countries')->get();
        return view('frontend.admin.orders.assign_to_delivery',$data);
    }

    public function assign_to_driver($id)
    {
       
   $data3= DB::table('logistic_leads')->where('order_id',$id)->first();

        $drivers = Vehicle::leftjoin('employees', 'employees.unique_id', '=', 'vehicles.driver_id')
        ->where('employees.job_position', '=', '9')
        ->select('vehicles.*', 'employees.emp_name', 'employees.unique_id')
        ->orderBy('employees.order_id', 'ASC')
        ->get();
    foreach ($drivers as $a => $driver) {
        $name =  $driver['emp_name'];
        $id = $driver['unique_id'];

        $data1[] =
            [
                'id' => $id,
                'title' => $name,
            ];
    }
    $data1[] =
        [
            'id' => 0,
            'title' => 'No Preference',
        ];

    $event = LogisticDashboard::leftjoin('employees', 'employees.unique_id', '=', 'logistic_dashboards.driver_id')
        ->select('employees.emp_name', 'logistic_dashboards.*')
        ->get();

        if (count($event) == 0) {
            $data2[] =
                [
                    'resourceId' => 1,
                    'title' => '',
                    'start' => '',
                    'end' => '',
                ];
        }
  
    foreach ($event as $events) {
        $resourceId = $events['driver_id'];
        $name = $events['emp_name'];

        $startTime = $events['start_time'];

        $endTime = $events['end_time'];
        $data2[] =
            [
                'resourceId' => $resourceId,
                'title' => $name,
                'start' => $startTime,
                'end' => $endTime,
            ];
    }

    //$data['therapy']= $therapy;

    $data['cal'] = json_encode($data1);
    $data['event'] = json_encode($data2);
    $data['lead'] = $data3;
    $data['drivers'] = $drivers;



    return view('frontend.admin.logisticManagement.logistic_dashboard.index1', $data);
    }

    public function  assign_driver($id)
    {
        $data['drivers'] = Employee::where('job_position',1)->get();
        $data['warehouse'] = DB::table('ware_houses')->where('status',1)->get();
        $data['collection'] = DB::table('collection')->where('order_id',$id)->first();
    
        $data['order_id'] = $id;
        return view('frontend.admin.orders.assign_driver',$data);
    }
    public function  saveCollection(Request $request)
    {
       $data = DB::table('collection')->where('order_id',$request->order_id)->get();
       if($data)
       {
        DB::table('collection')->where('order_id',$request->order_id)->update([
            'order_id'=>$request->order_id,
            'driver_id'=>$request->driver_id,
            'warehouse_id'=>$request->warehouse_id,
            'type'=>$request->type,
            'remarks'=>$request->remarks,
        ]);
       }
       else{
        DB::table('collection')->insert([
            'order_id'=>$request->order_id,
            'driver_id'=>$request->driver_id,
            'warehouse_id'=>$request->warehouse_id,
            'type'=>$request->type,
            'remarks'=>$request->remarks,
        ]);
       }
       
      DB::table('orders')->where('id',$request->order_id)->update([
                 'order_status'=>5,
      ]);
      return redirect(route('orderList'))->with('message','Driver assigned to order collection');
    }
    public function createOrder()
    {
        $data['vehicles'] = Vehicle::all();
        return view('frontend.admin.orders.add',$data);
    }
    public function addOrder(Request $request)
    {
        DB::table('fleet_orders')->insert([
            'customer_id'=>$request->customer_id,
            'order_date'=>$request->order_date,
            'order_time'=>$request->order_time,
            'vehicle_id'=>$request->vehicle_id,
            'pickup_address'=>$request->pickup_address,
            'delivery_address'=>$request->delivery_address,
            'po_number'=>$request->po_number,
            'type'=>$request->type,
            'remarks'=>$request->remarks,
        ]);
        return redirect(route('orderList'))->with('message','Fleet Order Submitted');
    }
}
