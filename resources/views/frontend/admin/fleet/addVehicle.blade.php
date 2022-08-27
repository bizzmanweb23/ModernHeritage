@extends('frontend.admin.layouts.master')
@section('content')

<form action="{{ route('saveVehicle') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">

            <h5>Vehicle Details</h5>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle no:</label>
                        <input type="text" class="form-control" id="vehicle_no" name="vehicle_no" placeholder="e.g - WB38M1347" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle image:</label>
                        <input type="file" class="form-control" id="vehicle_image" name="vehicle_image" placeholder="e.g - WB38M1347" required>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Brand:</label>
                        <select class="form-control" id="brand_id" name="brand_id" required>
                        <option value="">Select </option>
                            @foreach ($brands as $b)
                            <option value="{{ $b->id }}">{{ $b->brand_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label>Model:</label>
                        <select class="form-control" id="model_name" name="model_name" >
                       
                     
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
                            <option value="{{ $d->unique_id }}">{{ $d->emp_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Chassis Number:</label>
                        <input type="text" class="form-control" id="chassis_no" name="chassis_no" placeholder="Chassis no" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_colour">Color:</label>
                        <input type="text" class="form-control" id="model_colour" name="model_colour" placeholder="Blue">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_year">Manufacturing Year:</label>
                        <input type="text" class="form-control" id="model_year" name="model_year">
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="capacity">Vehicle Type:</label>
                        <select name="vehicle_type" id="vehicle_type" class="form-control" required>

                            <option value="Lorry Crane">Lorry Crane </option>
                            <option value="Lorry">Lorry </option>
                            <option value="Crane">Crane </option>
                            <option value="Car">Car </option>
                            <option value="Bike">Bike </option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Scheme:</label>
                        <input type="text" class="form-control" id="vehicle_scheme" name="vehicle_scheme" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Vehicle Capacity (in Ton):</label>
                        <input type="text" class="form-control" id="capacity" name="capacity" placeholder="10 Ton Lorry Crane">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Engine no:</label>
                        <input type="text" class="form-control" id="engine_no" name="engine_no" placeholder="e.g- BWA190024">
                    </div>
                </div>



            </div>
        </div>
    </div><br>
    <div class="card">
        <div class="card-body">
            <h5>Trip Charges</h5>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_hour">Trip Hours:</label>
                        <input type="number" class="form-control" id="trip_hour" name="trip_hour" min="2" max="10" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_price">Per Trip Price (/Trip):</label>
                        <input type="text" class="form-control" id="trip_price" name="trip_price" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>OT After 2hrs (/Hr):</label>
                        <input type="text" class="form-control" id="after_trip_price" name="after_trip_price">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Additional Location (/Locn):</label>
                        <input type="text" class="form-control" id="additional_locn_price" name="additional_locn_price" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Rates After 6pm (1.5x):</label>
                        <input type="text" class="form-control" id="after_6pm_price" name="after_6pm_price" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Rates After 10pm (2x):</label>
                        <input type="text" class="form-control" id="after_10pm_price" name="after_10pm_price" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="trip_price">Half Day (4 Hrs):</label>
                        <input type="text" class="form-control" id="half_day_price" name="half_day_price" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Full Day (8 Hrs):</label>
                        <input type="text" class="form-control" id="full_day_price" name="full_day_price" >
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sun & PH (/Hr) (min 3Hrs):</label>
                        <input type="text" class="form-control" id="sunday_price" name="sunday_price" >
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
                        <input type="date" class="form-control" id="road_tax_expiry" name="road_tax_expiry" placeholder="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Inspection Due Date:</label>
                        <input type="date" class="form-control" id="inspection_due_date" name="inspection_due_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Eligibility:</label>
                        <input type="text" class="form-control" id="parf_eligibility" name="parf_eligibility">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>PARF Rebate Amount:</label>
                        <input type="text" class="form-control" id="parf_rebate_amount" name="parf_rebate_amount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Expiry Date:</label>
                        <input type="date" class="form-control" id="coe_expiry_date" name="coe_expiry_date">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>COE Rebate Amount:</label>
                        <input type="text" class="form-control" id="coe_rebate_amount" name="coe_rebate_amount">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Total Rebate Amount:</label>
                        <input type="text" class="form-control" id="total_rebate_amount" name="total_rebate_amount">
                    </div>
                </div>

            </div>
            <div class="ms-auto text-end">
                <button class="btn btn-primary" id="save">Save</button>
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