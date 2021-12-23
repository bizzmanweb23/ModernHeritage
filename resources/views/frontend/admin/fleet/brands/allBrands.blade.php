@extends('frontend.admin.fleet.index')

@section('page')
  <h6 class="font-weight-bolder mb-0">Brands</h6>
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
            <a href="" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add Brands</a>
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
<!-- The Brand Modal -->
<div class="modal" id="addBrandModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('saveBrands') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Modal header -->
                <div class="modal-header">
                    <h4 class="modal-title">New Brand</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row mb-2">
                        <div class="col-md-7">
                            <label for="brand_name">Brand Name:</label>
                            <input type="text" class="form-control" id="brand_name" name="brand_name" required>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="upload">
                                <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                    style="height: 100px; width:100px">
                                <label for="brand_image" class="edit">
                                    <i class="fas fa-pencil-alt"></i>
                                    <input id="brand_image" type="file" style="display: none" name="brand_image">
                                </label>
                            </div>
                        </div>
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
<div class= "d-flex flex-row flex-wrap">
    @foreach($brands as $b )
        <div class="card m-2" style="width: 15rem">
            <a href="#">
                <div class="card-body p-2">
                    <div class="row">
                        <div class="col-md-4">
                            @if(isset($b->brand_image))
                                <img src="{{ asset($b->brand_image) }}" alt="Product"
                                    style="height: 4rem; width:4rem">
                            @else
                                <img src="{{ asset('images/products/default.jpg') }}"
                                    alt="Product" style="height: 4rem; width: 4rem">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <p class="mb-0">{{ $b->brand_name }}</p>
                            <p class="mb-0"> {{ $b->count }} MODELS</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div
@endsection