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
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                            aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back"
                        href="{{ route('allcustomer') }}"><i class="fas fa-arrow-left text-dark me-2"
                            aria-hidden="true"></i>Back</a>
                </div>
                @if($errors->any())
                    <div class="alert alert-warning">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
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
                    <div class="col-md-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="customer_type" id="customertype2"
                                value="company">
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
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                            <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile"
                                        placeholder="Mobile" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Street Name, House No, Door No, City" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="state">State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="zipcode">Zipcode</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Country">
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
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                        </div>
                    </div>
                </div>

                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group company">
                            <label for="gst_no">GST No.</label>
                            <input type="text" class="form-control" id="gst_no" name="gst_no"
                                placeholder="Enter GST No.">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="website">Tags</label>
                            <select multiple="multiple" name="tag[]" id="tag" class="form-control">
                                @foreach($tag as $t)
                                    <option value="{{ $t->id }}">
                                        {{ $t->tag_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                {{-- Tab lists --}}
                <ul class="nav nav-tabs mt-4" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#contact_address">Contact & Address</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#sales">Sales</a>
                    </li>
                </ul>


                {{-- Tab Panes --}}
                <div class="tab-content mb-3">

                    {{-- contact_address --}}
                    <div id="contact_address" class="container tab-pane active"><br>

                        <input type="hidden" name="address_row_count" id="address_row_count" value=0>
                        <div id="more_address"></div>
                        
                        <a class="btn btn-link text-dark px-3 mb-0" id="add_more" href="#">
                            <i class="fas fa-plus text-dark me-2" aria-hidden="true"></i>
                            Add Address
                        </a>

                    </div>

                    {{-- sales --}}
                    <div id="sales" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="salesperson">Salesperson:</label>
                                <select name="salesperson" id="salesperson" class="form-control">
                                    <option value=""> --Select-- </option>
                                    @foreach($salesPerson as $sp)
                                        <option value="{{ $sp->id }}">{{ $sp->emp_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="deliveryMethod">Delivery Method:</label>
                                <select name="deliveryMethod" id="deliveryMethod" class="form-control">
                                    <option value=""> --Select-- </option>
                                    @foreach($deliveryMethod as $dm)
                                        <option value="{{ $dm->method_type }}">{{ $dm->method_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label for="paymentTerms">Payment Terms:</label>
                                <select name="paymentTerms" id="paymentTerms" class="form-control">
                                    <option value=""> --Select-- </option>
                                    @foreach($paymentTerms as $pt)
                                        <option value="{{ $pt->terms_of_payment }}">{{ $pt->terms_of_payment }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
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
