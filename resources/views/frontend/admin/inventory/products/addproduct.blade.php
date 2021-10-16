@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">New Product</h4>
<div class="card-body pt-4 p-3">
    <div class="row">
        <div class="col-md-4">
            <span class="mb-2 ">Product Name:
                <span class="text-dark font-weight-bold ms-sm-2"
                    id="client_name_span"></span>
                <input type="text" name="client_name" id="client_name"
                    value="" placeholder="Add Product Name"  class="form-control" required/>
            </span>
        </div>
    </div>
</div> 
@endsection
