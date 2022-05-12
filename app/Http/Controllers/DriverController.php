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
       
          echo json_encode(1);

    }
}
