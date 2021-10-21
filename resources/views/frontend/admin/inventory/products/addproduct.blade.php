@extends('frontend.admin.inventory.index')

@section('inventory_content')
<h4 class="font-weight-bolder mb-2 mt-2">New Product</h4>
<form action="#" method="post" enctype="multipart/form-data">
    <div class="card-body pt-4 p-3">
        <div class="row">
            <div class="col-md-8">
                <span class="mb-2 ">Product Name:
                    <input type="text" name="product_name" id="product_name"
                        value="" placeholder="Add Product Name"  class="form-control" required/>
                </span>
            </div>
            <div class="col-md-4">
                <span class="mb-2 ">Product Image:
                <input type="file" name="product_image" id="product_image" class="form-control">
                </span>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4 align-content-center">
                <input type="checkbox" name="sold" id="sold" >
                <span class="text-dark font-weight-bold ms-sm-2">
                    Can be sold
                </span>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4 align-content-center">
                <input type="checkbox" name="purchased" id="purchased" >
                <span class="text-dark font-weight-bold ms-sm-2">
                    Can be purchased
                </span>
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-4 align-content-center">
                <input type="checkbox" name="expensed" id="expensed" >
                <span class="text-dark font-weight-bold ms-sm-2">
                    Can be expensed
                </span>
            </div>
        </div>

        <ul class="nav nav-tabs mt-4" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#general_information">General Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#variants">Variants</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#sales">Sales</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#ecommerce">eCommerce</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#purchase">Purchase</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#inventory">Inventory</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#parameter">Parameter</a>
            </li>
        </ul>

        <div class="tab-content mb-3">
            <div id="general_information" class="container tab-pane active">
                @include('frontend.admin.inventory.products.general_information')
            </div>
            <div id="sales" class="container tab-pane active">
                @include('frontend.admin.inventory.products.sales')
            </div>
        </div>
    </div> 
</form>
@endsection
