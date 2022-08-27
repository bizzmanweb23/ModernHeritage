@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">
        <h5>Add Product Category</h5><br>
            <form action="{{ route('addproductcategory') }}" method="post">
                @csrf
                <div class="row">
             
                    <div class="col-md-6">
                    <label>Category</label>
                            <input type="text" name="category_name" id="category_name" value="" placeholder="Add Category Name" class="form-control" required />
                      
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
                        <a class="btn btn-info" id="back"
                        href="{{ route('allproductcategory') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection