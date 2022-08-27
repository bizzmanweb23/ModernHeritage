@extends('frontend.admin.fleet.index')

@section('page')
  <h6 class="font-weight-bolder mb-0">Models</h6>
@endsection

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
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addModelModal">Add Model</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="brand_name" placeholder="Search..."
                    name="brand_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- The Model Modal -->
<div class="modal" id="addModelModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('saveModels') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Model</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <label for="model_name">Model Name:</label>
                            <input type="text" class="form-control" id="model_name" name="model_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="brand_id">Brand:</label>
                            <select class="form-control" id="brand_id" name="brand_id" required>
                                <option value="">Select Brand</option>
                                @foreach ($brands as $b)
                                    <option value="{{ $b->id }}">{{ $b->brand_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="vehicle_type">Vehicle Type:</label>
                            <select class="form-control" id="vehicle_type" name="vehicle_type" required>
                                <option value="">Select type</option>
                                <option value="car">Car</option>
                                <option value="bike">Bike</option>
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="accordion" id="modelsaccordion">
    @foreach ($brands as $b)
    <div class="accordion-item">
        <h2 class="accordion-header" id="panelsStayOpen-heading{{ $b->id }}" style="{{ $b->id % 2 == 0 ? 'background-color: lightgrey' : 'background-color: bisque' }}">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse{{ $b->id }}" aria-expanded="true" aria-controls="panelsStayOpen-collapse{{ $b->id }}">
            <strong>{{ $b->brand_name }} ({{ count($b->models) }})</strong>
          </button>
        </h2>
        <div id="panelsStayOpen-collapse{{ $b->id }}" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading{{ $b->id }}">
          <div class="accordion-body">
            <div class= "d-flex flex-row flex-wrap">
                @foreach($b->models as $m )
                    <div class="card m-2" style="width: 15rem">
                        <a href="#">
                            <div class="card-body p-2">
                                <div class="row">
                                    <div class="col-md-8">
                                        <p class="mb-0">{{ $m->model_name }}</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach 
            </div>
          </div>
        </div>
      </div>
    @endforeach
</div>
@endsection

