@extends('frontend.admin.fleet.index')

@section('fleet_content')
<style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }

</style>
<form action="{{ route('saveVehicle') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card">
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="ms-auto text-end">
                <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                        aria-hidden="true"></i>Save</button>
                <a class="btn btn-link text-dark px-3 mb-0" id="back"
                    href="#"><i class="fas fa-arrow-left text-dark me-2"
                        aria-hidden="true"></i>Back</a>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="model_name">Model:</label>
                        <select class="form-control" id="model_name" name="model_name" onchange="onModelSelect({{ $models }})" required>
                            <option value="">Select Model</option>
                            @foreach ($models as $m)
                                <option value="{{ $m->id }}">{{ $m->model_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="license_plate_no">License Plate No:</label>
                        <input type="text" class="form-control" id="license_plate_no" name="license_plate_no"
                            placeholder="e.g - WB38M1347" required>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-2">
                    <div class="">
                        <img name="vehicle_image" id="vehicle_image" src="{{ asset('images/products/default.jpg') }}" alt="Product"
                            style="height: 100px; width:100px">
                    </div>
                </div>
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
                        <label for="chassis_no">Chassis Number:</label>
                        <input type="text" class="form-control" id="chassis_no" name="chassis_no"
                            placeholder="Chassis no" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_colour">Model Color:</label>
                        <input type="text" class="form-control" id="model_colour" name="model_colour"
                            placeholder="Blue">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="model_year">Model Year:</label>
                        <input type="text" class="form-control" id="model_year" name="model_year">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

<script>
    function onModelSelect(models){
        var selected_model = $('#model_name').val();
        var image = "";
        if (selected_model === null || selected_model === undefined || selected_model === ""){
            $("#vehicle_image").attr("src","{{ asset('/') }}images/products/default.jpg");
        } else {
            // console.log('model',models[selected_model-1]);
            models.forEach(model => {
                if(model.id == selected_model) {
                    console.log('model', model);
                    image = model.brand_image;
                }
            });
            $("#vehicle_image").attr("src",`{{ asset('/') }}${image}`);
        }
    }
</script>