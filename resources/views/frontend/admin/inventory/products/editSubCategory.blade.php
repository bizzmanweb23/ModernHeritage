@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
            <h5>Edit Product Sub Category</h5>
            <br>
            <form action="{{ route('updateproductsubcategory') }}" method="post">
                @csrf
                <div class="row">
                <input type="hidden" name="id" id="id" value="{{$data->id}}"  class="form-control" required />
                    <div class="col-md-6">
                        <label>Parent Category</label>
                            <select name="cat_id" id="cat_id" class="form-control" required>
                            <option value="">--Select--</option>
                                @foreach($product_categories as $cat)
                                <option value="{{$cat->id}}" @if($data->cat_id == $cat->id) selected @endif>{{$cat->category_name}}</option>
                                @endforeach

                            </select>
                     
                    </div>
                    <div class="col-md-6">
                    <label>Sub Category</label>
                            <input type="text" name="sub_category" id="sub_category" value="{{$data->sub_category}}" placeholder="Add Sub Category Name" class="form-control" required />
                   
                    </div>

                    <div class="col-md-6">
                    <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                <option value="0" @if($data->status == 0) selected @endif >Inactive</option>

                            </select>
                        
                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('allproductsubcategory') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection