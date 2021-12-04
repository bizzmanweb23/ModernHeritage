@extends('frontend.admin.layouts.master')

@section('content')
<style>
    .upload {
  height: 100px;
  width: 100px; 
  position: relative;
}

.upload:hover > .edit {
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
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <form action="{{ url('/') }}/admin/customeredit/{{ $customer->id }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="card-body pt-4 p-3">
                    <div class="ms-auto text-end">
                        <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                                class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                            href="{{ route('allcustomer') }}"><i
                                class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                        <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                                aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i
                                class="far fa-trash-alt me-2"></i>Discard</a>
                    </div>
                    {{-- Customer type and image view mode --}}
                    <div class="row mb-2 view_span">
                        <div class="col-md-4">
                            <span class="mb-2 ">Customer type:
                                <span class="text-dark font-weight-bold ms-sm-2 text-uppercase"
                                    id="customer_type_span">{{ $customer->customer_type }}
                                </span>
                            </span>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-2">
                            <div class="upload">
                                @if (isset($customer->customer_image))
                                    <img src="{{ asset($customer->customer_image) }}" alt="Product" style="height: 100px; width:100px">
                                @else
                                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                                @endif
                            </div>
                        </div> 
                    </div>

                    {{-- Customer type and image edit mode --}}
                    <div class="row mb-2 edit_input">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="customer_type" id="customertype1" value="individual" {{ $customer->customer_type == 'individual' ? 'checked' : '' }}>
                                <label class="form-check-label" for="customer_type">
                                    Individual
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="customer_type" id="customertype2" value="company" {{ $customer->customer_type == 'company' ? 'checked' : '' }}>
                                <label class="form-check-label" for="customer_type">
                                    Company
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-2">
                            <div class="upload">
                                @if (isset($customer->customer_image))
                                    <img src="{{ asset($customer->customer_image) }}" alt="Product" style="height: 100px; width:100px">
                                @else
                                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                                @endif
                                <label for="customer_image" class="edit">
                                    <i class="fas fa-pencil-alt"></i>                    
                                    <input id="customer_image" type="file" style="display: none" name="customer_image">
                                </label> 
                            </div>
                        </div> 
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2 ">Customer:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="customer_name_span">{{ $customer->customer_name }}</span>
                                <input type="text" name="customer_name" id="customer_name"
                                    value="{{ $customer->customer_name }}" placeholder="Customer Name" class="form-control edit_input"
                                    required />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Mobile:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="customer_mobile_span">{{ $customer->mobile }}</span>
                                <div class="row edit_input">
                                    <div class="col-md-3">
                                        <select name="country_code_m" class="form-control"  id="country_code_m">
                                            <option value="">--Select--</option>
                                            @foreach($countryCodes as $c)
                                                <option value="+{{ $c->code }}" {{ substr($customer->mobile, 0, 3) == $c->code ? 'selected' : '' }}>+{{ $c->code }}({{ $c->name }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="mobile" id="mobile"
                                            value="{{ substr($customer->mobile, 3) }}" placeholder="Customer Mobile" class="form-control edit_input"
                                            required />    
                                    </div>
                                </div>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2 ">Address:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="address_span">{{ $customer->address }}</span>
                                <input type="text" name="address" id="address"
                                    value="{{ $customer->address }}" placeholder="Customer Address" class="form-control edit_input"
                                    required />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Email:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="email_span">{{ $customer->email }}</span>
                                <input type="email" name="email" id="email"
                                    value="{{ $customer->email }}" placeholder="Customer" class="form-control edit_input"
                                    required />
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <span class="mb-2 ">State:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="state_span">{{ $customer->state }}</span>
                                <input type="text" name="state" id="state"
                                    value="{{ $customer->state }}" placeholder="Customer Address" class="form-control edit_input"/>
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="mb-2 ">Zipcode:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="zipcode_span">{{ $customer->zipcode }}</span>
                                <input type="text" name="zipcode" id="zipcode"
                                    value="{{ $customer->zipcode }}" placeholder="Customer Address" class="form-control edit_input"/>
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="mb-2 ">Country:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="country_span">{{ $customer->country }}</span>
                                <input type="text" name="country" id="country"
                                    value="{{ $customer->country }}" placeholder="Customer Address" class="form-control edit_input"/>
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Website:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="website_span">{{ $customer->website }}</span>
                                <input type="text" name="website" id="website"
                                    value="{{ $customer->website }}" placeholder="Customer website" class="form-control edit_input"/>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2 company">GST Treatment:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="gst_treatment_span">{{ $customer->gst }}</span>
                                <select name="gst_treatment" id="gst_treatment" class="form-control edit_input">
                                    <option value=""> --Select-- </option>
                                    @foreach($gst as $g)
                                        <option value="{{ $g->gst_treatment }}" {{ $g->gst_treatment == $customer->gst ? 'selected' : '' }}>{{ $g->gst_treatment }}</option>
                                    @endforeach
                                </select>
                            </span> 
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Tags:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span" id="email_span">
                                    @foreach($selected_tags_name as $st)
                                        {{ $st }} &nbsp;
                                    @endforeach
                                </span>
                                <select multiple="multiple" name="tag[]" id="tag" class="form-control edit_input">
                                    @foreach($tag as $t)
                                        <option value="{{ $t->id }}"
                                            {{ (isset($selected_tags)&&in_array($t->id,$selected_tags))?'selected':'' }}>
                                            {{ $t->tag_name }}</option>
                                    @endforeach
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2 company">GST No:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="gst_no_span">{{ $customer->gst }}</span>
                                <input type="text" name="gst_no" id="gst_no"
                                    value="{{ $customer->gst_no }}" placeholder="GST No." class="form-control edit_input"/>
                            </span>
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
                        <span style="display: none" id="contact_type">{{ $customer->contact_type }}</span>
                        <div style="display: flex; flex-wrap: no-wrap;" class="edit_input">
                            <div class="form-check mr-2">
                                <input class="form-check-input contact_radio" type="radio" name="contact_type" id="contact" value="contact" {{ $customer->contact_type == "contact" ? "checked" : ""}}>
                                <label class="form-check-label" for="contact_type">
                                    Contact
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input not_contact_radio" type="radio" name="contact_type" id="invoice" value="invoice" {{ $customer->contact_type == "invoice" ? "checked" : ""}}>
                                <label class="form-check-label" for="contact_type">
                                    Invoice Address
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input not_contact_radio" type="radio" name="contact_type" id="delivery" value="delivery" {{ $customer->contact_type == "delivery" ? "checked" : ""}}>
                                <label class="form-check-label" for="contact_type">
                                    Delivery Address
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input not_contact_radio" type="radio" name="contact_type" id="other" value="other" {{ $customer->contact_type == "other" ? "checked" : ""}}>
                                <label class="form-check-label" for="contact_type">
                                    Other Address
                                </label>
                            </div>
                            <div class="form-check mr-2">
                                <input class="form-check-input not_contact_radio" type="radio" name="contact_type" id="private" value="private" {{ $customer->contact_type == "private" ? "checked" : ""}}>
                                <label class="form-check-label" for="contact_type">
                                    Private Address
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <span class="mb-2">Contact Name:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_name">{{ $customer->contact_name }}</span>
                                            <input type="text" class="form-control edit_input" name="contact_name" id="contact_name" value="{{ $customer->contact_name }}">
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="mb-2">Email:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_email">{{ $customer->contact_email }}</span>
                                            <input type="email" class="form-control edit_input" name="contact_email" id="contact_email" value="{{ $customer->contact_email }}">
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <div class="contact">
                                            <span class="mb-2">Title:
                                                <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                        id="contact_title">{{ $customer->contact_title }}</span>
                                                <select name="contact_title" id="contact_title" class="form-control edit_input">
                                                    <option value="Mr." {{ 'Mr.' == $customer->contact_title ? 'selected' : '' }}>Mister</option>
                                                    <option value="Ms." {{ 'Ms.' == $customer->contact_title ? 'selected' : '' }}>Miss</option>
                                                    <option value="Mrs." {{ 'Mrs.' == $customer->contact_title ? 'selected' : '' }}>Madam</option>
                                                    <option value="Dr." {{ 'Dr.' == $customer->contact_title ? 'selected' : '' }}>Doctor</option>
                                                    <option value="Prof."{{ 'Prof.' == $customer->contact_title ? 'selected' : '' }}>Professor</option>
                                                </select>
                                            </span>
                                        </div>
                                        <div class="notcontact">
                                            <span class="mb-2">Address:
                                                <span class="text-dark ms-sm-2 font-weight-bold view_span "
                                                        id="contact_address">{{ $customer->contact_address }}</span>
                                                <input type="text" class="form-control edit_input" name="contact_address" id="contact_address" value="{{ $customer->contact_address }}">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="mb-2">Phone:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_phone">{{ $customer->contact_phone }}</span>
                                            <input type="text" class="form-control edit_input" name="contact_phone" id="contact_phone" value="{{ $customer->contact_phone }}">
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 contact">
                                        <span class="mb-2">Job Position:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_job_position">{{ $customer->contact_job_position }}</span>
                                            <input type="text" class="form-control edit_input" name="contact_job_position" id="contact_job_position" value="{{ $customer->contact_job_position }}">
                                        </span>
                                    </div>
                                    <div class="col-md-2 notcontact">
                                        <span class="mb-2">State:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_state">{{ $customer->contact_state }}</span>
                                                    <input type="text" class="form-control edit_input" name="contact_state" id="contact_state" value="{{ $customer->contact_state }}">
                                        </span>
                                    </div>
                                    <div class="col-md-2 notcontact">
                                        <span class="mb-2">Zipcode:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_zipcode">{{ $customer->contact_zipcode }}</span>
                                                    <input type="text" class="form-control edit_input" name="contact_zipcode" id="contact_zipcode" value="{{ $customer->contact_zipcode }}">
                                        </span>
                                    </div>
                                    <div class="col-md-2 notcontact">
                                        <span class="mb-2">Country:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_country">{{ $customer->contact_country }}</span>
                                                    <input type="text" class="form-control edit_input" name="contact_country" id="contact_country" value="{{ $customer->contact_country }}">
                                        </span>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="mb-2">Mobile:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_mobile">{{ $customer->contact_mobile }}</span>
                                                    <input type="text" class="form-control edit_input" name="contact_mobile" id="contact_mobile" value="{{ $customer->contact_mobile }}">
                                        </span>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        <span class="mb-2">Notes:
                                            <span class="text-dark ms-sm-2 font-weight-bold view_span"
                                                    id="contact_notes">{{ $customer->contact_notes }}</span>
                                                    <input type="text" class="form-control edit_input" name="contact_notes" id="contact_notes" value="{{ $customer->contact_notes }}">
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                {{-- view mode of contact image --}}
                                <div class="upload view_span">
                                    @if (isset($customer->contact_image))
                                        <img src="{{ asset($customer->contact_image) }}" alt="Product" style="height: 100px; width:100px">
                                    @else
                                        <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                                    @endif
                                </div>
                                {{-- edit mode of contact image --}}

                                <div class="upload edit_input">
                                    @if (isset($customer->contact_image))
                                        <img src="{{ asset($customer->contact_image) }}" alt="Product" style="height: 100px; width:100px">
                                    @else
                                        <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                                    @endif
                                    <label for="contact_image" class="edit">
                                        <i class="fas fa-pencil-alt"></i>                    
                                        <input id="contact_image" type="file" style="display: none" name="contact_image">
                                    </label> 
                                </div>
                            </div>
                        </div>                        
                    </div>

                    {{-- sales --}}
                    <div id="sales" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2 company">Salesperson:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="salesperson">{{ $customer->salesperson }}</span>
                                    <select name="salesperson" id="salesperson" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($salesperson as $sp)
                                            <option value="{{ $sp->person_name }}" {{ $sp->person_name == $customer->salesperson ? 'selected' : '' }}>{{ $sp->person_name }}</option>
                                        @endforeach
                                    </select>
                                </span> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2 company">Delivery Method:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="deliveryMethod">{{ $customer->deliveryMethod }}</span>
                                    <select name="deliveryMethod" id="deliveryMethod" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($deliveryMethod as $dm)
                                            <option value="{{ $dm->method_type }}" {{ $dm->method_type == $customer->deliveryMethod  ? 'selected' : '' }}>{{ $dm->method_type }}</option>
                                        @endforeach
                                    </select>
                                </span> 
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2 company">Payment Terms:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="paymentTerms">{{ $customer->payment_terms }}</span>
                                    <select name="paymentTerms" id="paymentTerms" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($paymentTerms as $pt)
                                            <option value="{{ $pt->terms_of_payment }}" {{ $pt->terms_of_payment == $customer->payment_terms  ? 'selected' : '' }}>{{ $pt->terms_of_payment }}</option>
                                        @endforeach
                                    </select>
                                </span> 
                            </div>
                        </div>
                    </div>
                </div>
            </form>          
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#save').hide();
        $('#discard').hide();
        $('.edit_input').hide();
        if ($('#customer_type_span').text().trim() !== 'company') {
            $('.company').hide();
        }

        if ($('#contact_type').text().trim() === 'contact') {
            $('.notcontact').hide();
        }
        else{
            $('.contact').hide();
        }
    });

    $('#edit').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#edit').hide();
        $('#back').hide();
        $('.edit_input').show();
        $('.view_span').hide();
            $('#tag').select2({
            width: '100%',
            placeholder: "Select a tag",
            allowClear: true
        });
    });

    $('#customertype1').click(function(){
        $('.company').hide();
    })
    $('#customertype2').click(function(){
        $('.company').show();
    })

    $('#discard').click(function () {
        location.reload();
    });

    
    $('.contact_radio').click(function () {
        $('.contact').show();
        $('.notcontact').hide();
    });

    $('.not_contact_radio').click(function () {
        $('.contact').hide();
        $('.notcontact').show();
    });

</script>
@endsection
