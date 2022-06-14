@extends('frontend.admin.layouts.master')
@section('content')


    <div class="card">
        <div class="card-body">

            <h5>Vehicle Details</h5>
            <div class="ms-auto text-end">
                
                <a class="btn btn-link" id="back" href="{{ route('allVehicles') }}"><i class="fa fa-arrow-left"></i>Back</a>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle no:</label>
                       {{$data->vehicle_no}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle image:</label>
                        <img src="{{asset($data->vehicle_image)}}" style="height:60px; width:60px;" />
                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Brand:</label>
                        {{$data->brand_name}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Model:</label>
                        {{$data->model_name}}
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>License Plate No:</label>
                        <input type="text" class="form-control" id="license_plate_no" name="license_plate_no" placeholder="e.g - WB38M1347" required>
                    </div>
                </div> -->


            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="driver_id">Driver:</label>
                        {{$data->emp_name}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Chassis Number:</label>
                        {{$data->chassis_no}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_colour">Color:</label>
                        {{$data->model_colour}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_year">Manufacturing Year:</label>
                        {{$data->model_year}}
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle Type:</label>
                        {{$data->vehicle_type}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Scheme:</label>
                        {{$data->vehicle_scheme}}
                      
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Capacity:</label>
                        {{$data->capacity}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Engine no:</label>
                        {{$data->engine_no}}
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for="trip_hour">Trip Hours:</label>
                        {{$data->trip_hour}}
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="trip_price">Per Trip Price (/Trip):</label>
                        {{$data->trip_price}}
                    </div>
                </div>
            </div>
            <hr>
            <h5>Key Dates & Rebates</h5>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Road Tax Expiry:</label>
                    
                        {{date('d/m/Y', strtotime($data->road_tax_expiry))}} 
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Inspection Due Date:</label>
                
                       {{date('d/m/Y', strtotime($data->inspection_due_date))}} 
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Eligibility:</label>
                        {{$data->parf_eligibility}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Rebate Amount:</label>
                        {{$data->parf_rebate_amount}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Expiry Date:</label>
                        {{date('d/m/Y', strtotime($data->coe_expiry_date))}} 
         
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Rebate Amount:</label>
                        {{$data->coe_rebate_amount}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Total Rebate Amount:</label>
                        {{$data->total_rebate_amount}}
                    </div>
                </div>

            </div>
           
        </div>
    </div>



@endsection