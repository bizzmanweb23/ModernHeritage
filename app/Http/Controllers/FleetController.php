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
        $vehicle = Vehicle::select('vehicles.*','vehicle_brands.brand_name','vehicle_models.model_name')
                        ->join('vehicle_brands','vehicle_brands.id','vehicles.brand_id')
                        ->join('vehicle_models','vehicle_models.id','vehicles.model_name')
                        ->get();
           
         
         
        return view('frontend.admin.fleet.allVehicles', ['vehicle' => $vehicle]);
    }

    public function addVehicles()
    {
        $drivers = Employee::where('job_position', '1')->get();
        $brands = VehicleBrand::where('status', '1')->get();
        $models = VehicleModel::get();
        return view(
            'frontend.admin.fleet.addVehicle',
            [
                'drivers' => $drivers,
                'models' => $models,
                'brands' => $brands,
            ]
        );
    }

    public function saveVehicle(Request $request)
    {
        $data = $request->validate([
            'model_name' => 'required',
            'vehicle_no' => 'required|unique:vehicles,vehicle_no',
            'driver_id' => 'required|unique:vehicles,driver_id',
            'chassis_no' => 'required',
        ]);

     

        $str_time = time();
        if ($request->file('vehicle_image')) {
            $file_type = $request->file('vehicle_image')->extension();
            $file_path = $request->file('vehicle_image')->storeAs('images/vehicles', 'Vehicle_' . $str_time . '.' . $file_type, 'public');
            $request->file('vehicle_image')->move(public_path('images/vehicles'), 'Vehicle_' . $str_time . '.' . $file_type);
        } else {
            $file_path = null;
        }

        $vehicle = new Vehicle;
        $vehicle->model_name = $request->model_name;
        $vehicle->license_plate_no = 1;
        $vehicle->driver_id = $request->driver_id;
        $vehicle->chassis_no = $request->chassis_no;
        $vehicle->vehicle_image = $file_path;
        $vehicle->model_colour = $request->model_colour;
        $vehicle->model_year = $request->model_year;
        $vehicle->status = '1';
        $vehicle->capacity = $request->capacity;
        $vehicle->trip_hour = $request->trip_hour;
        $vehicle->trip_price = $request->trip_price;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_scheme =  $request->vehicle_scheme;
        $vehicle->engine_no = $request->engine_no;
        $vehicle->road_tax_expiry = $request->road_tax_expiry;
        $vehicle->inspection_due_date  =  $request->inspection_due_date;
        $vehicle->parf_eligibility = $request->parf_eligibility;
        $vehicle->parf_rebate_amount = $request->parf_rebate_amount;
        $vehicle->coe_expiry_date = $request->coe_expiry_date;
        $vehicle->coe_rebate_amount  = $request->coe_rebate_amount;
        $vehicle->total_rebate_amount = $request->total_rebate_amount;
        $vehicle->vehicle_no = $request->vehicle_no;

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
        if ($request->file('brand_image')) {
            $file_type = $request->file('brand_image')->extension();
            $file_path = $request->file('brand_image')->storeAs('images/vehicle_brands', 'Brand_' . $str_time . '.' . $file_type, 'public');
            $request->file('brand_image')->move(public_path('images/vehicle_brands'), 'Brand_' . $str_time . '.' . $file_type);
        } else {
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
        $models['models'] = VehicleModel::select('vehicle_models.*', 'vehicle_brands.brand_name')->join('vehicle_brands', 'vehicle_brands.id', 'vehicle_models.brand_id')->get();

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
        $brand = VehicleBrand::where('id', $request->id)->delete();

        return json_encode(1);
    }
    public function editBrand($id)
    {
        $brand['brand'] = VehicleBrand::find($id);
        return view('frontend.admin.fleet.brands.editBrands', $brand);
    }
    public function updateBrands(Request $request)
    {
        $data = $request->validate([
            'brand_name' => 'required',

        ]);
        $str_time = time();
        if ($request->file('brand_image')) {
            $file_type = $request->file('brand_image')->extension();
            $file_path = $request->file('brand_image')->storeAs('images/vehicle_brands', 'Brand_' . $str_time . '.' . $file_type, 'public');
            $request->file('brand_image')->move(public_path('images/vehicle_brands'), 'Brand_' . $str_time . '.' . $file_type);
        } else {
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
        $brand['brand'] = VehicleBrand::where('status', 1)->get();
        return view('frontend.admin.fleet.models.add', $brand);
    }

    public function editModel($id)
    {
        $model['model'] = VehicleModel::select('vehicle_models.*', 'vehicle_brands.brand_name')
                            ->where('vehicle_models.id', $id)
                            ->join('vehicle_brands', 'vehicle_brands.id', 'vehicle_models.brand_id')
                            ->first();
        $model['brand'] = VehicleBrand::where('status', 1)->get();
        return view('frontend.admin.fleet.models.edit', $model);
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
        VehicleModel::where('id', $request->id)->delete();
        return json_encode(1);
    }
    public function models(Request $request)
    {
        $model=VehicleModel::where('brand_id',$request->brand_id)->get();
        return response()->json($model);
    }
    public function deleteVehicle(Request $request)
    {
        Vehicle::where('id',$request->id)->delete();
        return response()->json(1);
    }
    public function editVehicle($id)
    {
        $data['drivers'] = Employee::where('job_position', '1')->get();

        $data['brands'] = VehicleBrand::where('status', '1')->get();
        $data['data'] = Vehicle::where('id',$id)->first();
        $data['models'] = VehicleModel::where('status', '1')->get();
        return view('frontend.admin.fleet.editVehicle', $data);

    }

    public function updateVehicle(Request $request)
    {
        $data = $request->validate([
            'model_name' => 'required',
            'vehicle_no' => 'required|unique:vehicles,vehicle_no,'.$request->id,
            'driver_id' => 'required|unique:vehicles,driver_id,'.$request->id,
            'chassis_no' => 'required',
        ]);

     

        $str_time = time();
        if ($request->file('vehicle_image')) {
            $file_type = $request->file('vehicle_image')->extension();
            $file_path = $request->file('vehicle_image')->storeAs('images/vehicles', 'Vehicle_' . $str_time . '.' . $file_type, 'public');
            $request->file('vehicle_image')->move(public_path('images/vehicles'), 'Vehicle_' . $str_time . '.' . $file_type);
        } else {
            $file_path = $request->vehicle_image_old;
        }

        $vehicle = Vehicle::find($request->id);
        $vehicle->model_name = $request->model_name;
        $vehicle->license_plate_no = 1;
        $vehicle->driver_id = $request->driver_id;
        $vehicle->chassis_no = $request->chassis_no;
        $vehicle->vehicle_image = $file_path;
        $vehicle->model_colour = $request->model_colour;
        $vehicle->model_year = $request->model_year;
        $vehicle->status = '1';
        $vehicle->capacity = $request->capacity;
        $vehicle->trip_hour = $request->trip_hour;
        $vehicle->trip_price = $request->trip_price;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->vehicle_scheme =  $request->vehicle_scheme;
        $vehicle->engine_no = $request->engine_no;
        $vehicle->road_tax_expiry = $request->road_tax_expiry;
        $vehicle->inspection_due_date  =  $request->inspection_due_date;
        $vehicle->parf_eligibility = $request->parf_eligibility;
        $vehicle->parf_rebate_amount = $request->parf_rebate_amount;
        $vehicle->coe_expiry_date = $request->coe_expiry_date;
        $vehicle->coe_rebate_amount  = $request->coe_rebate_amount;
        $vehicle->total_rebate_amount = $request->total_rebate_amount;
        $vehicle->vehicle_no = $request->vehicle_no;

        $vehicle->save();

        return redirect()->route('allVehicles')->with('success', 'Vehicle updated successfully !');
    }


    public function viewVehicle($id)
    {
       $data['data'] =Vehicle::select('vehicles.*','vehicle_brands.brand_name','vehicle_models.model_name')
                            ->join('vehicle_brands','vehicle_brands.id','vehicles.brand_id')
                            ->join('vehicle_models','vehicle_models.id','vehicles.model_name')
                            ->where('vehicles.id',$id)
                             ->first();

       return view('frontend.admin.fleet.viewVehicle', $data);

    }

    public function maintenance()
    {

        return view('frontend.admin.maintenance.index');
    }

    public function  addMaintenance()
    {
        return view('frontend.admin.maintenance.add');
    }
}
