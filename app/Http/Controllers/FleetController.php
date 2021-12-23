<?php
namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Vehicle;
use App\Models\VehicleBrand;
use App\Models\VehicleModel;
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
        $vehicle->status = '1';
        $vehicle->save();

        return redirect(route('allVehicles'));
    }

    public function allBrands()
    {
        $brands = VehicleBrand::get();
        foreach ($brands as $b) {
            $count = VehicleModel::where('brand_id', $b->id)->get()->count();
            $b->count = $count;
        }
        return view('frontend.admin.fleet.brands.allBrands', ['brands' => $brands]);
    }

    public function saveBrands(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required',
            'brand_image' => 'required',
        ]);
        $str_time = time();
        if($request->file('brand_image')){
            $file_type = $request->file('brand_image')->extension();
            $file_path = $request->file('brand_image')->storeAs('images/vehicle_brands','Brand_'.$str_time.'.'.$file_type,'public');
            $request->file('brand_image')->move(public_path('images/vehicle_brands'),'Brand_'.$str_time.'.'.$file_type);
        }
        else
        {
            $file_path = null;
        }

        $brand = new VehicleBrand;
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $file_path;
        $brand->save();

        return redirect(route('allBrands'));
    }
    
    public function allModels()
    {
        $brands = VehicleBrand::get();
        foreach ($brands as $b) {
            $models = VehicleModel::where('brand_id', $b->id)->get();
            $b->models = $models;
        }
        return view('frontend.admin.fleet.models.allModels', ['brands' => $brands]);
    }

    public function saveModels(Request $request)
    {
        $data = $request->validate([
            'model_name' => 'required',
            'brand_id' => 'required',
            'vehicle_type' => 'required',
        ]);
        $model = new VehicleModel;
        $model->model_name = $request->model_name;
        $model->brand_id = $request->brand_id;
        $model->vehicle_type = $request->vehicle_type;
        $model->save();

        return redirect(route('allModels'));
    }
}