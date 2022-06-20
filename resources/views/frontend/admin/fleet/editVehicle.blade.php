@extends('frontend.admin.layouts.master')
@section('content')

<form action="{{ route('updateVehicle') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <h5>Vehicle Details</h5>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle no:</label>
                        <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}" required>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" value="{{$data->vehicle_no}}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle image:</label>
                        <input type="file" class="form-control" id="vehicle_image" name="vehicle_image">
                        <input type="hidden" value="{{$data->vehicle_image}}" class="form-control" id="vehicle_image_old" name="vehicle_image_old">
                        <img src="{{asset($data->vehicle_image)}}" style="height:60px; width:60px;" />
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Brand:</label>
                        <select class="form-control" id="brand_id" name="brand_id" required>
                            <option value="">Select </option>
                            @foreach ($brands as $b)
                            <option value="{{ $b->id }}" @if($b->id == $data->brand_id) selected @endif>{{ $b->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Model:</label>
                        <select class="form-control" id="model_name" name="model_name">
                        @foreach ($models as $m)
                            <option value="{{ $m->id }}" @if($m->id == $data->model_name) selected @endif>{{ $m->model_name }}</option>
                            @endforeach

                        </select>
                    </div>
                </div> -->
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
                        <select class="form-control" id="driver_id" name="driver_id" required>
                            <option value="">--select--</option>
                            @foreach ($drivers as $d)
                            <option value="{{ $d->unique_id }}" @if($d->unique_id == $data->driver_id) selected @endif>{{ $d->emp_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Chassis Number:</label>
                        <input type="text" class="form-control" id="chassis_no" name="chassis_no" value="{{$data->chassis_no}}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_colour">Color:</label>
                        <input type="text" class="form-control" id="model_colour" name="model_colour" value="{{$data->model_colour}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_year">Manufacturing Year:</label>
                        <input type="text" class="form-control" id="model_year" name="model_year" value="{{$data->model_year}}">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle Type:</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-control" required>

                            <option value="Crane" @if($data->vehicle_type == 'Crane') selected @endif>Crane </option>
                            <option value="Lorry" @if($data->vehicle_type == 'Lorry') selected @endif>Lorry </option>
                            <option value="Car" @if($data->vehicle_type == 'Car') selected @endif>Car </option>
                            <option value="Bike" @if($data->vehicle_type == 'Bike') selected @endif>Bike </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Scheme:</label>
                        <input type="text" class="form-control" id="vehicle_scheme" value="{{$data->vehicle_scheme}}" name="vehicle_scheme">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Capacity (in ton):</label>
                        <input type="text" class="form-control" id="capacity" value="{{$data->capacity}}" name="capacity">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Engine no:</label>
                        <input type="text" class="form-control" id="engine_no" value="{{$data->engine_no}}" name="engine_no">
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="form-group">
                        <label for="trip_price">Status:</label>
                        <select name="status" id="status" class="form-control" required>

                            <option value="1" @if($data->status == 1) selected @endif>Active </option>
                            <option value="0" @if($data->status == 0) selected @endif>Inactive </option>

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <h5>Trip Charges</h5>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_hour">Trip Hours:</label>
                        <input type="number" class="form-control" id="trip_hour" name="trip_hour" min="2" max="10" value="{{$data->trip_hour}}"required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_price">Per Trip Price (/Trip):</label>
                        <input type="number" class="form-control" id="trip_price" name="trip_price" value="{{$data->trip_price}}" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>OT After 2hrs (/Hr):</label>
                        <input type="number" class="form-control" id="after_trip_price" name="after_trip_price" value="{{$data->after_trip_price}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Additional Location (/Locn):</label>
                        <input type="number" class="form-control" id="additional_locn_price" name="additional_locn_price" value="{{$data->additional_locn_price}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Rates After 6pm (1.5x):</label>
                        <input type="number" class="form-control" id="after_6pm_price" name="after_6pm_price" value="{{$data->after_6pm_price}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Rates After 10pm (2x):</label>
                        <input type="number" class="form-control" id="after_10pm_price" name="after_10pm_price" value="{{$data->after_10pm_price}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_price">Half Day (4 Hrs):</label>
                        <input type="number" class="form-control" id="half_day_price" name="half_day_price" value="{{$data->half_day_price}}">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Full Day (8 Hrs):</label>
                        <input type="number" class="form-control" id="full_day_price" name="full_day_price" value="{{$data->full_day_price}}" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sun & PH (/Hr) (min 3Hrs):</label>
                        <input type="number" class="form-control" id="sunday_price" name="sunday_price" value="{{$data->sunday_price}}">
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="card">
        <div class="card-body">

            <h5>Key Dates & Rebates</h5>
            <hr>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Road Tax Expiry:</label>
                        <input type="date" class="form-control" id="road_tax_expiry" name="road_tax_expiry" value="{{$data->road_tax_expiry}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Inspection Due Date:</label>
                        <input type="date" class="form-control" id="inspection_due_date" name="inspection_due_date" value="{{$data->inspection_due_date}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Eligibility:</label>
                        <input type="text" class="form-control" id="parf_eligibility" name="parf_eligibility" value="{{$data->parf_eligibility}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Rebate Amount:</label>
                        <input type="text" class="form-control" id="parf_rebate_amount" name="parf_rebate_amount" value="{{$data->parf_rebate_amount}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Expiry Date:</label>
                        <input type="date" class="form-control" id="coe_expiry_date" name="coe_expiry_date" value="{{$data->coe_expiry_date}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Rebate Amount:</label>
                        <input type="text" class="form-control" id="coe_rebate_amount" name="coe_rebate_amount" value="{{$data->coe_rebate_amount}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Total Rebate Amount:</label>
                        <input type="text" class="form-control" id="total_rebate_amount" name="total_rebate_amount" value="{{$data->total_rebate_amount}}">
                    </div>
                </div>

            </div>
            <div class="ms-auto text-end">
                <button class="btn btn-primary" id="save">Update</button>
                <a class="btn btn-info" id="back" href="{{ route('allVehicles') }}">Back</a>
            </div>
        </div>
    </div>
    </div>
    </div>
</form>
<script>
    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ $error }}");
    @endforeach
    @endif
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#brand_id').on('change', function(e) {
            var brand_id = e.target.value;
            $.ajax({
                url: "{{ route('model') }}",
                type: "GET",
                data: {
                    brand_id: brand_id
                },
                success: function(data) {


                    if (data) {
                        $('#model_name').empty();
                        $('#model_name').append('<option hidden>Choose Model</option>');
                        $.each(data, function(key, model) {
                            $('select[name="model_name"]').append('<option value="' + model.id + '">' + model.model_name + '</option>');
                        });
                    } else {
                        $('#model_name').empty();
                    }
                }
            })
        });
    });
</script>
@endsection