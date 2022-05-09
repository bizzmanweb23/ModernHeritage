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
<form action="{{ route('updateCustomer') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input id="id" type="hidden"  name="id" value="{{$data->id}}">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="ms-auto text-end">
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Update</button>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('allcustomer') }}"><i class="fas fa-arrow-left text-dark me-2"
                            aria-hidden="true"></i>Back</a>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="customer_type" id="customertype1"
                                value="individual" @if($data->customer_type=='individual') checked @endif>
                            <label class="form-check-label" for="customer_type">
                                Individual
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="customer_type" id="customertype2"
                                value="company" @if($data->customer_type=='company') checked @endif>
                            <label class="form-check-label" for="customer_type">
                                Company
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-2">
                        <div class="upload">
                            @if($data->image=='')
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                style="height: 100px; width:100px">
                            @else
                            <img src="{{ asset($data->image) }}" alt="Product" style="height: 5rem; width:5rem">
                            @endif

                            <label for="customer_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="customer_image" type="file" style="display: none" name="customer_image">
                                <input id="customer_image_old" type="text" style="display: none" name="customer_image_old" value="{{$data->image}}">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                placeholder="Name" value="{{$data->name}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <div class="col-md-3">
                                <?php
                                  $cod= substr($data->mobile,0, -10);
                                   
                                        ?>
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                       
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif>+{{ $c->code }}({{ $c->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        placeholder="Mobile" value="<?php echo substr($data->mobile,-10); ?>" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{$data->email}}" required>
                        </div>
                    </div>
                 
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                    </div> -->
                </div>

             
             
                <div class="row mt-1">
        
                    <div class="col-md-6">
                        <div class="form-group company" id="gst">
                            <label for="gst">GST Treatment</label>
                            <select name="gst_treatment" id="gst_treatment" class="form-control">
                                <option value=""> --Select-- </option>
                                @foreach($gst as $g)
                                    <option value="{{ $g->gst_treatment }}" @if($g->gst_treatment == $data->gst_treatment) selected @endif>{{ $g->gst_treatment }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company">
                            <label for="gst_no">GST No.</label>
                            <input type="text" class="form-control" id="gst_no" name="gst_no"
                                placeholder="Enter GST No." value="{{$data->gst_no}}">
                        </div>
                    </div>
               
                
               
                   
                </div>
              

                <div class="row mt-1">
                    <h5>Delivery Details</h5>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Address</label>
                            <input type="text" class="form-control" id="delivery_address" name="delivery_address"
                                placeholder="Delivery address"  value="{{$data->delivery_address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">State</label>
                            <input type="text" class="form-control" id="delivery_state" name="delivery_state"
                                placeholder="Delivery state" value="{{$data->delivery_state}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Country</label>
                            <input type="text" class="form-control" id="delivery_country" name="delivery_country"
                                placeholder="Delivery country" value="{{$data->delivery_country}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Zipcode</label>
                            <input type="text" class="form-control" id="delivery_zipcode" name="delivery_zipcode"
                                placeholder="Delivery zipcode" value="{{$data->delivery_zipcode}}">
                        </div>
                    </div>
                   
                </div>
                <div class="row mt-1">
                    <h5>Billing Details</h5>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Address</label>
                            <input type="text" class="form-control" id="billing_address" name="billing_address"
                                placeholder="Billing address" value="{{$data->billing_address}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">State</label>
                            <input type="text" class="form-control" id="billing_state" name="billing_state"
                                placeholder="Billing state" value="{{$data->billing_state}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Country</label>
                            <input type="text" class="form-control" id="billing_country" name="billing_country"
                                placeholder="Billing country" value="{{$data->billing_country}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Zipcode</label>
                            <input type="text" class="form-control" id="billing_zipcode" name="billing_zipcode"
                                placeholder="Billing zipcode" value="{{$data->billing_zipcode}}">
                        </div>
                    </div>
                   
                </div>
                <div class="row mt-1">
                   
                  
                </div>

               


               
            </div>
        </div>
    </div>
</form>
<script>
    @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
    
    $(document).ready(function () {
  
        $('.company').hide();
      
        $('#customertype1').click(function () {
            $('.company').hide();
        });

        $('#customertype2').click(function () {
            $('.company').show();
        });
    });

    

    function contact_radio_click(count) {
        $(`.contact`+count).show();
        $(`.notcontact`+count).hide();
    };
    function not_contact_radio_click(count) {
        $(`.contact`+count).hide();
        $(`.notcontact`+count).show();
    };

    $('#tag').select2({
        width: '100%',
        placeholder: "Select a Tag",
        allowClear: true
    });

</script>
@endsection
