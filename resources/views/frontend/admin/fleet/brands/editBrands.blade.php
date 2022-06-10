@extends('frontend.admin.layouts.master')

@section('content')
<h4>Edit Vehicle Brands</h4>
<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('updateBrands')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Brand Name</label>
                    <input type="hidden" class="form-control" id="id" name="id" value="{{$brand->id}}">
                    <input type="text" class="form-control" value="{{$brand->brand_name}}"id="brand_name" name="brand_name" placeholder="Enter a brand name" required>
                </div>
                
                <div class="form-group col-md-6">
                    <label>Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="1" @if($brand->status == 1) selected @endif> Active </option>
                        <option value="0" @if($brand->status == 0) selected @endif> Inactive </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Brand Image</label>
                    <input type="file" class="form-control" id="brand_image" name="brand_image">
                    <input type="hidden" value="{{$brand->brand_image}}" class="form-control" id="brand_image_old" name="brand_image_old">
                    <img src="{{asset($brand->brand_image)}}" />
                </div>
                <div class="form-group col-md-6">
                </div>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('allBrands')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection