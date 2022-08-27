@extends('frontend.admin.inventory.index')

@section('inventory_content')
    <h4 class="font-weight-bolder mb-2 mt-2">New Category</h4>
    <form action="{{ route('addproductcategory') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <span class="mb-2 ">Category Name:
                    <input type="text" name="category_name" id="category_name"
                        value="" placeholder="Add Category Name"  class="form-control" required/>
                </span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection