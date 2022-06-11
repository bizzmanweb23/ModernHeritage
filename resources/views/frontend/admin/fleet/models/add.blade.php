@extends('frontend.admin.layouts.master')

@section('content')
<h4>Add Vehicle Models</h4>
<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('saveBrands')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Model</label>
                    <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Enter a model name" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Brand</label>
                    <select name="status" id="status" class="form-control">

                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Car type</label>

                    <select name="status" id="status" class="form-control">

                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Status</label>

                    <select name="status" id="status" class="form-control">

                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                    </select>
                </div>
              
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('allModels')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection