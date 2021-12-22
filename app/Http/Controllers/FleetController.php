<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vehicle;
use Illuminate\Http\Request;


class FleetController extends Controller
{
    public function allVehicles()
    {
        $vehicle = Vehicle::leftjoin('employees','vehicles.driver_id','=','employees.unique_id')
                            ->select('employees.emp_name','vehicles.*')
                            ->get();
        return view('frontend.admin.fleet.allVehicles',['vehicle' => $vehicle]);
    }

    public function addVehicles()
    {
        $drivers = Employee::where('job_position', '9')->get();
        return view('frontend.admin.fleet.addVehicle',
                            [
                                'drivers' => $drivers,
                            ]);
    }

    public function saveVehicle(Request $request)
    {
        $data = $request->validate([
                    'model_name' => 'required',
                    'license_plate_no' => 'required|unique:vehicles,license_plate_no',
                    'driver_id' => 'required',
                    'chassis_no' => 'required',
        ]);
        
        $str_time = time();
        if($request->file('vehicle_image')){
            $file_type = $request->file('vehicle_image')->extension();
            $file_path = $request->file('vehicle_image')->storeAs('images/vehicles','Vehicle_'.$str_time.'.'.$file_type,'public');
            $request->file('vehicle_image')->move(public_path('images/vehicles'),'Vehicle_'.$str_time.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        $vehicle = new Vehicle;
        $vehicle->model_name = $request->model_name;
        $vehicle->license_plate_no = $request->license_plate_no;
        $vehicle->driver_id = $request->driver_id;
        $vehicle->chassis_no = $request->chassis_no;
        $vehicle->vehicle_image = $file_path;
        $vehicle->model_colour = $request->model_colour;
        $vehicle->model_year = $request->model_year;
        $vehicle->save();

        return redirect(route('allVehicles'));
    }
}
