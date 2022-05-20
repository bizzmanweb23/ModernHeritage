@extends('frontend.admin.layouts.master')

@section('content')


<div class="container">
    <div class="card">

        <div class="card-body">
            <div class="ms-auto text-end">

                <a class="btn btn-link" id="back" href="{{ route('allproducts') }}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
            </div>
            <div class="row mt-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Product Name -</label>
                        {{$data->product_name}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Brand -</label>
                        {{$data->brand}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category -</label>
                        {{$data->category_name}}

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Color -</label>
                        @foreach($color as $cl)
                        {{$cl->name}},

                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Size -</label>
                        {{$data->height}} × {{$data->width}} {{$unit->ut}}

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price -</label>
                        {{$data->price}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>MRP Price -</label>
                        {{$data->mrp_price}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Available Quantity -</label>
                        {{$data->available_quantity}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>SKU -</label>
                        {{$data->sku}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group" id="gst">
                        <label>Tax % -</label>
                        {{$data->tax}}%
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Material -</label>
                        {{$data->material}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Weight -</label>
                        {{$data->weight}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Speed (RPM) -</label>
                        {{$data->speed}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Power Source -</label>
                        {{$data->power_source}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Voltage -</label>
                        {{$data->voltage}}volt
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Supplier Code -</label>
                        {{$data->supplier_code}}
                    </div>
                </div>

           

                <div class="col-md-12">
                    <div class="form-group">
                        <label>Product Images-</label>
                        <?php
                        $pr_img = $data->product_image;
                        $img = explode(',', $pr_img);
                        ?>
                        @foreach($img as $p)
                        <img src="{{ asset('images/products') }}/{{$p}}" alt="Product" style="height: 6rem; width:6rem">
                        @endforeach

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Status -</label>
                        @if($data->status==1)
                        <td><span class="badge badge-success">Active</span></td>
                        @else
                        <td><span class="badge badge-danger">Inactive</span></td>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Description -</label>
                        {{$data->description}}

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection