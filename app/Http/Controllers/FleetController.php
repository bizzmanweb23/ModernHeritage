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
                            ->leftjoin('vehicle_models','vehicles.model_name','=','vehicle_models.id')
                            ->leftjoin('vehicle_brands','vehicle_models.brand_id','=','vehicle_brands.id')
                            ->select('employees.emp_name','vehicles.*', 'vehicle_models.model_name', 'vehicle_brands.brand_image as vehicle_image')
                            ->orderBy('vehicles.id')
                            ->get();
        return view('frontend.admin.fleet.allVehicles',['vehicle' => $vehicle]);
    }

    public function addVehicles()
    {
        $drivers = Employee::where('job_position', '9')->get();
        $models = VehicleModel::leftjoin('vehicle_brands', 'vehicle_brands.id', '=', 'vehicle_models.brand_id')
                                ->select('vehicle_brands.brand_image', 'vehicle_models.*')
                                ->get();
        return view('frontend.admin.fleet.addVehicle',
                            [
                                'drivers' => $drivers,
                                'models' => $models,
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
        $vehicle->capacity = $request->capacity;
        $vehicle->trip_hour = $request->trip_hour;
        $vehicle->trip_price = $request->trip_price;
        $vehicle->after_trip_price = $request->after_trip_price;
        $vehicle->additional_locn_price = $request->additional_locn_price;
        $vehicle->after_6pm_price = floatval($request->after_trip_price)*1.5;
        $vehicle->after_10pm_price = floatval($request->after_trip_price)*2;
        $vehicle->full_day_price = floatval($request->after_trip_price)*8;
        $vehicle->sunday_price = floatval($request->after_trip_price)*2;
        $vehicle->save();

        return redirect()->route('allVehicles')->with('success', 'Vehicle saved successfully !');
    }

    public function allBrands()
    {
        $brands = VehicleBrand::get();
       
        return view('frontend.admin.fleet.brands.allBrands', ['brands' => $brands]);
    }

    public function saveBrands(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required',
            
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
        $brand->status = $request->status;
        $brand->save();

        return redirect(route('allBrands'));
    }
    
    public function allModels()
    {
        $models['models'] = VehicleModel::select('vehicle_models.*','vehicle_brands.brand_name')->join('vehicle_brands','vehicle_brands.id','vehicle_models.brand_id')->get();
      
        return view('frontend.admin.fleet.models.allModels', $models);
    }

    public function saveModels(Request $request)
    {
        
        $model = new VehicleModel;
        $model->model_name = $request->model_name;
        $model->brand_id = $request->brand_id;
        $model->vehicle_type = $request->vehicle_type;
        $model->status = $request->status;
        $model->save();

        return redirect(route('allModels'))->with('message', 'Model added successfully !');
    }
    public function addBrands()
    {
        return view('frontend.admin.fleet.brands.addBrands');
    }
    public function  deleteBrand(Request $request)
    {
       $brand = VehicleBrand::where('id',$request->id)->delete();
        
       return json_encode(1);
   

     
    }
    public function editBrand($id)
    {
        $brand['brand'] = VehicleBrand::find($id);
        return view('frontend.admin.fleet.brands.editBrands',$brand);
        
    }
    public function updateBrands(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required',
            
        ]);
        $str_time = time();
        if($request->file('brand_image')){
            $file_type = $request->file('brand_image')->extension();
            $file_path = $request->file('brand_image')->storeAs('images/vehicle_brands','Brand_'.$str_time.'.'.$file_type,'public');
            $request->file('brand_image')->move(public_path('images/vehicle_brands'),'Brand_'.$str_time.'.'.$file_type);
        }
        else
        {
            $file_path = $request->brand_image_old;
        }

        $brand = VehicleBrand::find($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_image = $file_path;
        $brand->status = $request->status;
        $brand->save();

        return redirect(route('allBrands'));
    }

    public function addModels(Request $request)
    {
        $brand['brand'] = VehicleBrand::where('status',1)->get();
        return view('frontend.admin.fleet.models.add',$brand);
    }

    public function editModel($id)
    {
        $model['model'] = VehicleModel::select('vehicle_models.*','vehicle_brands.brand_name')
                                        ->where('vehicle_models.id',$id)
                                        ->join('vehicle_brands','vehicle_brands.id','vehicle_models.brand_id')
                                        ->first();
         $model['brand'] = VehicleBrand::where('status',1)->get();
        return view('frontend.admin.fleet.models.edit',$model);
    }

    public function updateModels(Request $request)
    {
        $model =  VehicleModel::find($request->id);
        $model->model_name = $request->model_name;
        $model->brand_id = $request->brand_id;
        $model->vehicle_type = $request->vehicle_type;
        $model->status = $request->status;
        $model->save();

        return redirect(route('allModels'))->with('message', 'Model updated successfully !');
    }
    public function deleteModel(Request $request)
    {
        VehicleModel::where('id',$request->id)->delete();
        return json_encode(1);
    }
}
