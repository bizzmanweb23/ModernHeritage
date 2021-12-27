<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\LogisticLeadDriver;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
use Illuminate\Http\Request;


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
}
