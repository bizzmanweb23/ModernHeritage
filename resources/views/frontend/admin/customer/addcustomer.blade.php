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
              
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="customer_type" id="customertype1"
                                value="individual" checked>
                            <label class="form-check-label" for="customer_type">
                                Individual
                            </label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="customer_type" id="customertype2"
                                value="company" required>
                            <label class="form-check-label" for="customer_type">
                                Company
                            </label>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                    <div class="col-md-2">
                        <div class="upload">
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                style="height: 100px; width:100px">
                            <label for="customer_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="customer_image" type="file" style="display: none" name="customer_image">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="customer_name">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name"
                                placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m" required>
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        placeholder="Mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
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
                             required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required>
                        </div>
                    </div>
                </div>

             

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group company" id="gst">
                            <label for="gst">GST Treatment</label>
                            <select name="gst_treatment" id="gst_treatment" class="form-control">
                                <option value=""> --Select-- </option>
                                @foreach($gst as $g)
                                    <option value="{{ $g->gst_treatment }}">{{ $g->gst_treatment }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group company">
                            <label for="gst_no">GST No.</label>
                            <input type="text" class="form-control" id="gst_no" name="gst_no"
                                placeholder="Enter GST No.">
                        </div>
                    </div>
                  
                </div>
                <div class="row mt-1">
                    <h5>Delivery Details</h5>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Address</label>
                            <input type="text" class="form-control" id="delivery_address" name="delivery_address"
                                placeholder="Delivery address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">State</label>
                            <input type="text" class="form-control" id="delivery_state" name="delivery_state"
                                placeholder="Delivery state">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Country</label>
                            <input type="text" class="form-control" id="delivery_country" name="delivery_country"
                                placeholder="Delivery country">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Zipcode</label>
                            <input type="text" class="form-control" id="delivery_zipcode" name="delivery_zipcode"
                                placeholder="Delivery zipcode">
                        </div>
                    </div>
                   
                </div>
                <div class="row mt-1">
                    <h5>Billing Details</h5>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Address</label>
                            <input type="text" class="form-control" id="billing_address" name="billing_address"
                                placeholder="Billing address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">State</label>
                            <input type="text" class="form-control" id="billing_state" name="billing_state"
                                placeholder="Billing state">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Country</label>
                            <input type="text" class="form-control" id="billing_country" name="billing_country"
                                placeholder="Billing country">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <label for="gst">Zipcode</label>
                            <input type="text" class="form-control" id="billing_zipcode" name="billing_zipcode"
                                placeholder="Billing zipcode">
                        </div>
                    </div>
                   
                </div>
                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Save</button>
                    <a class="btn btn-info" id="back"
                        href="{{ route('allcustomer') }}">Back</a>
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

    window.count = 0;
    $('#add_more').click(function () {
        window.count++;
        console.log(window.count);
        $('#address_row_count').val(window.count);
        $('#more_address').append(`
                            <div class="mt-2 mb-2">
                                <div style="display: flex; flex-wrap: no-wrap;">
                                    <div class="form-check mr-2">
                                        <input class="form-check-input contact_radio${window.count}" type="radio" name="contact_type${window.count}"
                                            id="contact${window.count}" value="contact" onclick="contact_radio_click(${window.count})" checked>
                                        <label class="form-check-label" for="contact_type">
                                            Contact
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input not_contact_radio${window.count}" type="radio" name="contact_type${window.count}"
                                            id="invoice${window.count}" value="invoice" onclick="not_contact_radio_click(${window.count})">
                                        <label class="form-check-label" for="contact_type">
                                            Invoice Address
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input not_contact_radio${window.count}" type="radio" name="contact_type${window.count}"
                                            id="delivery${window.count}" value="delivery" onclick="not_contact_radio_click(${window.count})">
                                        <label class="form-check-label" for="contact_type">
                                            Delivery Address
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input not_contact_radio${window.count}" type="radio" name="contact_type${window.count}"
                                            id="other${window.count}" value="other" onclick="not_contact_radio_click(${window.count})">
                                        <label class="form-check-label" for="contact_type">
                                            Other Address
                                        </label>
                                    </div>
                                    <div class="form-check mr-2">
                                        <input class="form-check-input not_contact_radio${window.count}" type="radio" name="contact_type${window.count}"
                                            id="private${window.count}" value="private" onclick="not_contact_radio_click(${window.count})">
                                        <label class="form-check-label" for="contact_type">
                                            Private Address
                                        </label>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <label for="contact_description">Contact Description</label>
                                        <input type="text" class="form-control" name="contact_description${window.count}" id="contact_description${window.count}" placeholder="e.g. Invoice Address 1 or Delivery Address 1">
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="col-md-10">
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="contact_name">Contact Name</label>
                                                <input type="text" class="form-control" name="contact_name${window.count}" id="contact_name${window.count}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact_email">Email</label>
                                                <input type="email" class="form-control" name="contact_email${window.count}"
                                                    id="contact_email${window.count}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <div class="contact${window.count}">
                                                    <label for="contact_title">Title</label>
                                                    <select name="contact_title${window.count}" id="contact_title${window.count}" class="form-control">
                                                        <option value="Mr.">Mister</option>
                                                        <option value="Ms.">Miss</option>
                                                        <option value="Mrs.">Madam</option>
                                                        <option value="Dr.">Doctor</option>
                                                        <option value="Prof.">Professor</option>
                                                    </select>
                                                </div>
                                                <div class="notcontact${window.count}">
                                                    <label for="contact_address">Address</label>
                                                    <input type="text" class="form-control" name="contact_address${window.count}"
                                                        id="contact_address${window.count}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact_phone">Phone</label>
                                                <input type="text" class="form-control" name="contact_phone${window.count}" id="contact_phone${window.count}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 contact${window.count}">
                                                <label for="contact_job_position">Job Position</label>
                                                <input type="text" class="form-control" name="contact_job_position${window.count}"
                                                    id="contact_job_position${window.count}">
                                            </div>
                                            <div class="col-md-2 notcontact${window.count}">
                                                <label for="contact_state">State</label>
                                                <input type="text" class="form-control" name="contact_state${window.count}" id="contact_state${window.count}">
                                            </div>
                                            <div class="col-md-2 notcontact${window.count}">
                                                <label for="contact_zipcode">Zipcode</label>
                                                <input type="text" class="form-control" name="contact_zipcode${window.count}"
                                                    id="contact_zipcode${window.count}">
                                            </div>
                                            <div class="col-md-2 notcontact${window.count}">
                                                <label for="contact_country">Country</label>
                                                <input type="text" class="form-control" name="contact_country${window.count}"
                                                    id="contact_country${window.count}">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="contact_mobile">Mobile</label>
                                                <input type="text" class="form-control" name="contact_mobile${window.count}"
                                                    id="contact_mobile${window.count}">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="contact_notes">Notes</label>
                                                <input type="text" class="form-control" name="contact_notes${window.count}" id="contact_notes${window.count}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="row mt-2">
                                            <div class="col-md-2">
                                                <div class="upload">
                                                    <img src="{{ asset('images/products/default.jpg') }}"
                                                        alt="Product" style="height: 100px; width:100px">
                                                    <label for="contact_image${window.count}" class="edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                        <input id="contact_image${window.count}" type="file" style="display: none"
                                                            name="contact_image${window.count}">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        `);
                    
        $(`.notcontact${window.count}`).hide();

        
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
