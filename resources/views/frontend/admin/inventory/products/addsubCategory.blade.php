@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
            <h5>Create Product Sub Category</h5>
            <br>
            <form action="{{ route('addproductsubcategory') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Parent Category</label>
                            <select name="cat_id" id="cat_id" class="form-control" required>
                            <option value="">--Select--</option>
                                @foreach($product_categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                @endforeach

                            </select>
                     
                    </div>
                    <div class="col-md-6">
                    <label>Sub Category</label>
                            <input type="text" name="sub_category" id="sub_category" value="" placeholder="Add Sub Category Name" class="form-control" required />
                   
                    </div>

                    <div class="col-md-6">
                    <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        
                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('allproductsubcategory') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection