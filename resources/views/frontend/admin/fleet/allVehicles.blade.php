@extends('frontend.admin.fleet.index')

@section('page')
  <h6 class="font-weight-bolder mb-0">  All Vehicles</h6>
@endsection

@section('fleet_content')
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addVehicles') }}" class="btn btn-dark">Add Vehicles</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="emp_name" placeholder="Search..."
                    name="emp_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class= "d-flex flex-row flex-wrap">
    @foreach($vehicle as $v )
        <div class="card m-2" style="width: 18rem">
            <a href="#">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($v->vehicle_image))
                                <img src="{{ asset($v->vehicle_image) }}" alt="Product"
                                    style="height: 7rem; width:7rem">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 7rem; width: 7rem">
                            @endif
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-7">
                            <p class="mb-0">{{ $v->model_name }}</p>
                            <p class="mb-0">{{ $v->license_plate_no }}</p>
                            <p class="mb-0">{{ $v->emp_name }}</p>
                            @if ($v->status == 1)
                                <span class="badge badge-sm bg-gradient-success">Active</span>
                            @else                               
                                <span class="badge badge-sm bg-gradient-secondary">Inactive</span>
                            @endif
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection