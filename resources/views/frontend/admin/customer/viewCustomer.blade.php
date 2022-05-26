@extends('frontend.admin.layouts.master')

@section('content')
<style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }
</style>
<form action="{{ route('savecustomer') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">

                    <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ route('allcustomer') }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                </div>
                <div class="row">
                    <div class="col-md-3">
                    <div class="upload">
                   @if($data->image == '') 
                   <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                   @else
                   <img src="{{ asset($data->image) }}" alt="Product" style="height: 100px; width:100px">
                     @endif
                        </div>
                    </div>

                   
                </div>

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Name:</label>
                            {{$data->name}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile:</label>
                            +{{$data->mobile}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Phone:</label>
                            +{{$data->phone}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Website:</label>
                            {{$data->website}}

                        </div>
                    </div>
                </div>

                <div class="row mt-1">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            {{$data->email}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Customer Type:</label>
                            {{$data->customer_type}}
                        </div>
                    </div>
                </div>


                @if($data->customer_type=='company')
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group company" id="gst">
                            <label for="gst">GST Treatment</label>
                            {{$data->gst_treatment}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company">
                            <label for="gst_no">GST No.</label>
                            {{$data->gst_no}}
                        </div>
                    </div>

                </div>
                @endif

                <div class="row mt-1">
                   
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Address 1:</label>
                            {{$data->delivery_address}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Address 2:</label>
                            {{$data->delivery_address_1}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">State:</label>
                            {{$data->delivery_state}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Country:</label>
                            {{$data->delivery_country}}

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Zipcode:</label>
                            {{$data->delivery_zipcode}}
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row mt-1">
                    <h5>Billing Details-</h5>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Address 1</label>
                            {{$data->billing_address}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Address 2</label>
                            {{$data->billing_address_1}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">State</label>
                            {{$data->billing_state}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Country</label>
                            {{$data->billing_country}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="gst">Zipcode</label>
                            {{$data->billing_zipcode}}
                        </div>
                    </div>

                </div>



            </div>
        </div>
    </div>
</form>


@endsection