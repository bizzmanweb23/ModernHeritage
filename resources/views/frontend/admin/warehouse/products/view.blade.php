@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateWarePro') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">

                <div class="row mt-1">
                    <div class="ms-auto text-end">

                        <a class="btn btn-link" id="back" href="{{ url()->previous() }}"><i class="fa fa-arrow-left"></i>Back</a>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product: </label>
                            {{$data->product_name}}



                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Selling Price</label>
                            {{$data->selling_price}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Min Stock</label>
                            {{$data->min_stock}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Max Stock</label>
                            {{$data->max_stock}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Available Stock</label>
                            {{$data->avl_stock}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>SKU</label>
                            {{$data->sku}}
                        </div>
                    </div>



                </div>

            </div>
        </div>
    </div>
</form>


@endsection