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
                        <label>Sub Category -</label>
                        {{$data->sub_category}}

                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Color -</label>
                   
                        {{$data->color}}

       

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Size -</label>
                        {{$data->size}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Length -</label>
                        {{$data->length}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Width -</label>
                        {{$data->width}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Height -</label>
                        {{$data->height}}

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
                        <label>Coverage -</label>
                        {{$data->coverage}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Per Pallet -</label>
                        {{$data->per_pallet}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Per Box -</label>
                        {{$data->per_box}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Packing in bags -</label>
                        {{$data->pac_bags}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Loose, Per Lorry -</label>
                        {{$data->loose_per_lorry}}
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
                        @if($data->product_image!='')
                        @foreach($img as $p)
                        <img src="{{ asset('images/products') }}/{{$p}}" alt="Product" style="height: 6rem; width:6rem">
                        @endforeach
                        @endif

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