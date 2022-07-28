<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\LogisticLeadDriver;
use App\Models\User;
use App\Models\CountryCode;
use App\Models\Customer;
use App\Models\Department;
use App\Models\JobPosition;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;
use App\Models\LogisticLead;
use DB;


class DriverController extends Controller
{
    public function driverOverview()
    {
        return view('frontend.admin.driver.overview');
    }

    public function allDeliveries($delivery_time)
    {
        $today = date('Y-m-d');
        if ($delivery_time == 'today') {
            $condition = '>=';
        } else {
            $condition = '<';
        }
        $deliveries = LogisticLeadDriver::leftjoin('employees','employees.unique_id', '=', 'logistic_leads_drivers.driver_id')
                                                ->leftjoin('logistic_leads', 'logistic_leads.id', '=', 'logistic_leads_drivers.logistic_lead_id')
                                                ->where('logistic_leads.expected_date', $condition, $today)
                                                ->select('employees.emp_name', 'employees.work_mobile', 'employees.work_email', 'employees.emp_image',
                                                        'logistic_leads.*')
                                                ->orderBy('logistic_leads.expected_date')
                                                ->get();
        return view('frontend.admin.driver.deliveries',['deliveries' => $deliveries, 'delivery_time' => $delivery_time]);
    }
    public function drivers()

    {   
     

    
        $drivers['drivers'] = DB::table('employees')
                        ->where('employees.job_position', '=', '9')
                        ->orderBy('employees.order_id','ASC')
                        ->get();

        if(isset($_GET['type']))
        {
            if($_GET['type']==1 || $_GET['type']==0)
            {
                $drivers['drivers'] = DB::table('employees')
                ->where('employees.job_position', '=', '9')
                ->where('employees.status', '=', $_GET['type'])
                ->orderBy('employees.order_id','ASC')
                ->get();
            }
            else{
                $drivers['drivers'] = DB::table('employees')
                ->where('employees.job_position', '=', '9')
                ->orderBy('employees.order_id','ASC')
                ->get();
            }
           
        }

       
        return view('frontend.admin.driver.index1',$drivers);
    }
    public function addDriver ()
    {
          
        $data['countryCodes'] = CountryCode::get();
        $data['customer'] = Customer::get();
        $data['employee'] = Employee::get();
        $data['department'] = Department::get();
        $data['jobPosition'] = JobPosition::get();
        return view('frontend.admin.driver.add',$data);
    }

    public function viewDriver($id)
    {
        $driver['driver'] = DB::table('employees')
                                    ->select(
                                        'employees.*',
                                        'departments.department_name',
                                        'manager.emp_name as manager_name'
                                   
                                    )
                                ->where('employees.id', '=', $id)
                                ->leftjoin('employees as manager', 'employees.manager', '=', 'manager.id')
                                ->leftjoin('departments', 'employees.department', '=', 'departments.id')
                                ->first();
        return view('frontend.admin.driver.view',$driver);
    }
    public function editDriver(Request $request,$id)
    {
        $driver['countryCodes'] = CountryCode::get();
        $driver['department'] = Department::get();
        $driver['employees'] = Employee::where('id','!=',$id)->get();
        
        $driver['employee'] = Employee::leftjoin('departments', 'employees.department', '=', 'departments.id')
        ->leftjoin('job_positions','employees.job_position','=','job_positions.id')
        ->leftjoin('employees as manager', 'employees.manager', '=', 'manager.id')
        ->where('employees.id', $id)
        ->select(
            'employees.*',
            'departments.department_name',
            'manager.emp_name as manager_name',
            'job_positions.position_name'
        )
        ->first();
        
       return view('frontend.admin.driver.edit',$driver);
    }

    public function deliveries(Request $request)
    {
      if(isset($request->type)) 
       {
        $today = date('Y-m-d');
        if ($request->type == 'today') {
            $condition = '>=';
        } else {
            $condition = '<';
        }
        if($request->type == 'today' || $request->type == 'past')
        {
            $deliveries['deliveries'] = LogisticLeadDriver::leftjoin('employees','employees.unique_id', '=', 'logistic_leads_drivers.driver_id')
            ->leftjoin('logistic_leads', 'logistic_leads.id', '=', 'logistic_leads_drivers.logistic_lead_id')
            ->where('logistic_leads.expected_date', $condition, $today)
            ->select('employees.emp_name', 'employees.work_mobile', 'employees.work_email', 'employees.emp_image','logistic_leads.*')
            ->orderBy('logistic_leads.expected_date')
            ->get();
        }
        else
        {
            $deliveries['deliveries'] = LogisticLeadDriver::leftjoin('employees','employees.unique_id', '=', 'logistic_leads_drivers.driver_id')
            ->leftjoin('logistic_leads', 'logistic_leads.id', '=', 'logistic_leads_drivers.logistic_lead_id')
            ->select('employees.emp_name', 'employees.work_mobile', 'employees.work_email', 'employees.emp_image', 'logistic_leads.*')
            ->orderBy('logistic_leads.expected_date')
            ->get();
        }
  
       }
     else
       {
        $deliveries['deliveries'] = LogisticLeadDriver::leftjoin('employees','employees.unique_id', '=', 'logistic_leads_drivers.driver_id')
        ->leftjoin('logistic_leads', 'logistic_leads.id', '=', 'logistic_leads_drivers.logistic_lead_id')
        ->select('employees.emp_name', 'employees.work_mobile', 'employees.work_email', 'employees.emp_image','logistic_leads.*')
        ->orderBy('logistic_leads.expected_date')
        ->get();
       }
      
       $deliveries['status']=DB::table('order_status')->get();

      
        return view('frontend.admin.driver.deliveries1',$deliveries);
    }
    public function status_update(Request $request)

    {
     
          DB::table('logistic_leads')->where('id',$request->id)->update([
              'status'=>$request->status
          ]);
          DB::table('orders')->where('order_id',$request->order_id)->update([
            'order_status'=>$request->status
        ]);
         // echo json_encode(1);
         return back();
    }
    public function addToDelivery(Request $request)
    {  

      //  echo $request->expected_date;
       
        
        $unique_id = LogisticLead::orderBy('id', 'desc')->first();

  
        if ($unique_id) {
            $number = str_replace('MHL', '', $unique_id->unique_id);
        } else {
            $number = 0;
        }
        if ($number == 0) {
            $number = 'MHL000001';
        } else {
            $number = "MHL" . sprintf("%06d", $number + 1);
        }

        $logistic_lead = new LogisticLead;

        $logistic_lead->stage_id = 1;
        $logistic_lead->unique_id = $number;
        $logistic_lead->client_id = 1;
        $logistic_lead->client_name = $request->customer_name;
        $logistic_lead->expected_date = $request->expected_date;
        // $logistic_lead->pickup_from = $data['pickup_from'];
        $logistic_lead->pickup_client = $request->pickup_client;
        $logistic_lead->pickup_add_1 = $request->pickup_add_1;
        $logistic_lead->pickup_add_2 = $request->pickup_add_2;
        $logistic_lead->pickup_add_3 = $request->pickup_add_3;
        $logistic_lead->pickup_pin = $request->pickup_pin;
        $logistic_lead->pickup_state = $request->pickup_state;
        $logistic_lead->pickup_country = $request->pickup_country;
        $logistic_lead->pickup_location = $request->pickup_location;
        $logistic_lead->pickup_email = $request->pickup_email;
        $logistic_lead->pickup_phone = $request->pickup_phone;
        $logistic_lead->contact_name = $request->contact_name;
        $logistic_lead->contact_phone = $request->contact_phone;
        $logistic_lead->delivery_client = $request->delivery_client;
        // $logistic_lead->delivered_to = $data['delivered_to'];
        $logistic_lead->delivery_add_1 = $request->delivery_add_1;
        $logistic_lead->delivery_add_2 = $request->delivery_add_2;
        $logistic_lead->delivery_add_3 = $request->delivery_add_3;
        $logistic_lead->delivery_pin = $request->delivery_pin;
        $logistic_lead->delivery_state = $request->delivery_state;
        $logistic_lead->delivery_country = $request->delivery_country;
        $logistic_lead->delivery_location = $request->delivery_location;
        $logistic_lead->delivery_email = $request->delivery_email;
        $logistic_lead->delivery_phone = $request->delivery_phone;
        $logistic_lead->order_id = $request->order_id;
        $logistic_lead->status = $request->status;
        $logistic_lead->save();

        $data= DB::table('order_products')->where('order_id',$request->order_id)->get();

        foreach($data as $value)
        {
            DB::table('logistic_leads_products')->insert([
                'lead_id' => $number,
                'product_name' => $value->product_name,
                'quantity' => $value->product_quantity,
            ]);
        }
        DB::table('orders')->where('order_id',$request->order_id)->update([
            'delivery_status' => 1,
            'order_status' => 4,
  
        ]);
  
      
        return Redirect()->route('orderList');

    }

    
}
