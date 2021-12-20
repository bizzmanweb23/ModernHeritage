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
                    @if($errors->any())
                        <div class="alert alert-warning">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                                @if(isset($customer->customer_image))
                                    <img src="{{ asset($customer->customer_image) }}" alt="Product"
                                        style="height: 100px; width:100px">
                                @else
                                    <img src="{{ asset('images/products/default.jpg') }}"
                                        alt="Product" style="height: 100px; width:100px">
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Customer type and image edit mode --}}
                    <div class="row mb-2 edit_input">
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="customer_type" id="customertype1"
                                    value="individual"
                                    {{ $customer->customer_type == 'individual' ? 'checked' : '' }}>
                                <label class="form-check-label" for="customer_type">
                                    Individual
                                </label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="customer_type" id="customertype2"
                                    value="company"
                                    {{ $customer->customer_type == 'company' ? 'checked' : '' }}>
                                <label class="form-check-label" for="customer_type">
                                    Company
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-2">
                            <div class="upload">
                                @if(isset($customer->customer_image))
                                    <img src="{{ asset($customer->customer_image) }}" alt="Product"
                                        style="height: 100px; width:100px">
                                @else
                                    <img src="{{ asset('images/products/default.jpg') }}"
                                        alt="Product" style="height: 100px; width:100px">
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
                                    value="{{ $customer->customer_name }}" placeholder="Customer Name"
                                    class="form-control edit_input" required />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Mobile:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="customer_mobile_span">{{ $customer->mobile }}</span>
                                <div class="row edit_input">
                                    <div class="col-md-3">
                                        <select name="country_code_m" class="form-control" id="country_code_m">
                                            <option value="">--Select--</option>
                                            @foreach($countryCodes as $c)
                                                <option value="+{{ $c->code }}"
                                                    {{ substr($customer->mobile, 0, 3) == $c->code ? 'selected' : '' }}>
                                                    +{{ $c->code }}({{ $c->name }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="mobile" id="mobile"
                                            value="{{ substr($customer->mobile, 3) }}"
                                            placeholder="Customer Mobile" class="form-control edit_input" required />
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
                                <input type="text" name="address" id="address" value="{{ $customer->address }}"
                                    placeholder="Customer Address" class="form-control edit_input" required />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Email:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="email_span">{{ $customer->email }}</span>
                                <input type="email" name="email" id="email" value="{{ $customer->email }}"
                                    placeholder="Customer" class="form-control edit_input" required />
                            </span>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <span class="mb-2 ">State:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="state_span">{{ $customer->state }}</span>
                                <input type="text" name="state" id="state" value="{{ $customer->state }}"
                                    placeholder="Customer Address" class="form-control edit_input" />
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="mb-2 ">Zipcode:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="zipcode_span">{{ $customer->zipcode }}</span>
                                <input type="text" name="zipcode" id="zipcode" value="{{ $customer->zipcode }}"
                                    placeholder="Customer Address" class="form-control edit_input" />
                            </span>
                        </div>
                        <div class="col-md-2">
                            <span class="mb-2 ">Country:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="country_span">{{ $customer->country }}</span>
                                <input type="text" name="country" id="country" value="{{ $customer->country }}"
                                    placeholder="Customer Address" class="form-control edit_input" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Website:
                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                    id="website_span">{{ $customer->website }}</span>
                                <input type="text" name="website" id="website" value="{{ $customer->website }}"
                                    placeholder="Customer website" class="form-control edit_input" />
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
                                        <option value="{{ $g->gst_treatment }}"
                                            {{ $g->gst_treatment == $customer->gst ? 'selected' : '' }}>
                                            {{ $g->gst_treatment }}</option>
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
                                <input type="text" name="gst_no" id="gst_no" value="{{ $customer->gst_no }}"
                                    placeholder="GST No." class="form-control edit_input" />
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
                        <div class="d-flex flex-row flex-wrap" id="more_address">
                            <input type="hidden" name="address_row_count" id="address_row_count" value={{ count($customer_contacts) }}>
                            @foreach ($customer_contacts as $contact)
                            
                                {{-- In view state --}}
                                <div class="card m-2 view_span" style="background-color: lightsteelblue; width: 18rem">
                                    <a href="#" onclick="viewContactDetails({{ $contact }})">
                                        <div class="card-body p-2">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    @if (isset($contact->contact_image))
                                                        <img src=" {{ asset($contact->contact_image) }}" alt="Contact Image" style="height: 4rem; width:4rem">
                                                    @else
                                                        <img src=" {{ asset('images/products/default.jpg') }}" alt="Contact Image" style="height: 4rem; width:4rem">
                                                    @endif                                                   
                                                </div>
                                                <div class="col-sm-9">
                                                    <p class="mb-0 text-uppercase">{{ $contact->contact_type }}</p>
                                                    <p class="mb-0">{{ $contact->contact_name }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                {{-- In edit state --}}
                                <input type="hidden" name="existing_contact_id{{ $contact->index }}" value="{{ $contact->id }}">
                                <div class="mt-2 mb-2 edit_input">
                                    <div style="display: flex; flex-wrap: no-wrap;">
                                        <span style="display: none;" id="contact_type{{ $contact->index }}">{{ $contact->contact_type }}</span>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input contact_radio{{ $contact->index }}" type="radio" name="contact_type{{ $contact->index }}"
                                                id="contact{{ $contact->index }}" value="contact" onclick="contact_radio_click({{ $contact->index }})"
                                                {{ $contact->contact_type == "contact" ? "checked" : "" }}>
                                            <label class="form-check-label" for="contact_type{{ $contact->index }}">
                                                Contact
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input not_contact_radio{{ $contact->index }}" type="radio" name="contact_type{{ $contact->index }}"
                                                id="invoice{{ $contact->index }}" value="invoice" onclick="not_contact_radio_click({{ $contact->index }})"
                                                {{ $contact->contact_type == "invoice" ? "checked" : "" }}>
                                            <label class="form-check-label" for="contact_type{{ $contact->index }}">
                                                Invoice Address
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input not_contact_radio{{ $contact->index }}" type="radio" name="contact_type{{ $contact->index }}"
                                                id="delivery{{ $contact->index }}" value="delivery" onclick="not_contact_radio_click({{ $contact->index }})"
                                                {{ $contact->contact_type == "delivery" ? "checked" : "" }}>
                                            <label class="form-check-label" for="contact_type{{ $contact->index }}">
                                                Delivery Address
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input not_contact_radio{{ $contact->index }}" type="radio" name="contact_type{{ $contact->index }}"
                                                id="other{{ $contact->index }}" value="other" onclick="not_contact_radio_click({{ $contact->index }})"
                                                {{ $contact->contact_type == "other" ? "checked" : "" }}>
                                            <label class="form-check-label" for="contact_type{{ $contact->index }}">
                                                Other Address
                                            </label>
                                        </div>
                                        <div class="form-check mr-2">
                                            <input class="form-check-input not_contact_radio{{ $contact->index }}" type="radio" name="contact_type{{ $contact->index }}"
                                                id="private{{ $contact->index }}" value="private" onclick="not_contact_radio_click({{ $contact->index }})"
                                                {{ $contact->contact_type == "private" ? "checked" : "" }}>
                                            <label class="form-check-label" for="contact_type{{ $contact->index }}">
                                                Private Address
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <span class="mb-2">Contact Description:
                                                        <input type="text" class="form-control edit_input" name="contact_description{{ $contact->index }}"
                                                            id="contact_description{{ $contact->index }}" value="{{ $contact->contact_description }}">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <span class="mb-2">Contact Name:
                                                        <input type="text" class="form-control edit_input" name="contact_name{{ $contact->index }}"
                                                            id="contact_name{{ $contact->index }}" value="{{ $contact->contact_name }}">
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="mb-2">Email:
                                                        <input type="email" class="form-control edit_input" name="contact_email{{ $contact->index }}"
                                                            id="contact_email{{ $contact->index }}" value="{{ $contact->contact_email }}">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <div class="contact{{ $contact->index }}">
                                                        <span class="mb-2">Title:
                                                            <select name="contact_title{{ $contact->index }}" id="contact_title{{ $contact->index }}"
                                                                class="form-control edit_input">
                                                                <option value="Mr."
                                                                    {{ 'Mr.' == $contact->contact_title ? 'selected' : '' }}>
                                                                    Mister</option>
                                                                <option value="Ms."
                                                                    {{ 'Ms.' == $contact->contact_title ? 'selected' : '' }}>
                                                                    Miss</option>
                                                                <option value="Mrs."
                                                                    {{ 'Mrs.' == $contact->contact_title ? 'selected' : '' }}>
                                                                    Madam</option>
                                                                <option value="Dr."
                                                                    {{ 'Dr.' == $contact->contact_title ? 'selected' : '' }}>
                                                                    Doctor</option>
                                                                <option value="Prof."
                                                                    {{ 'Prof.' == $contact->contact_title ? 'selected' : '' }}>
                                                                    Professor</option>
                                                            </select>
                                                        </span>
                                                    </div>
                                                    <div class="notcontact{{ $contact->index }}">
                                                        <span class="mb-2">Address:
                                                            <input type="text" class="form-control edit_input"
                                                                name="contact_address{{ $contact->index }}" id="contact_address{{ $contact->index }}"
                                                                value="{{ $contact->contact_address }}">
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="mb-2">Phone:
                                                        <input type="text" class="form-control edit_input" name="contact_phone{{ $contact->index }}"
                                                            id="contact_phone{{ $contact->index }}" value="{{ $contact->contact_phone }}">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 contact{{ $contact->index }}">
                                                    <span class="mb-2">Job Position:
                                                        <input type="text" class="form-control edit_input"
                                                            name="contact_job_position{{ $contact->index }}" id="contact_job_position{{ $contact->index }}"
                                                            value="{{ $contact->contact_job_position }}">
                                                    </span>
                                                </div>
                                                <div class="col-md-2 notcontact{{ $contact->index }}">
                                                    <span class="mb-2">State:
                                                        <input type="text" class="form-control edit_input" name="contact_state{{ $contact->index }}"
                                                            id="contact_state{{ $contact->index }}" value="{{ $contact->contact_state }}">
                                                    </span>
                                                </div>
                                                <div class="col-md-2 notcontact{{ $contact->index }}">
                                                    <span class="mb-2">Zipcode:
                                                        <input type="text" class="form-control edit_input" name="contact_zipcode{{ $contact->index }}"
                                                            id="contact_zipcode" value="{{ $contact->contact_zipcode }}">
                                                    </span>
                                                </div>
                                                <div class="col-md-2 notcontact{{ $contact->index }}">
                                                    <span class="mb-2">Country:
                                                        <input type="text" class="form-control edit_input" name="contact_country{{ $contact->index }}"
                                                            id="contact_country{{ $contact->index }}" value="{{ $contact->contact_country }}">
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <span class="mb-2">Mobile:
                                                        <input type="text" class="form-control edit_input" name="contact_mobile{{ $contact->index }}"
                                                            id="contact_mobile{{ $contact->index }}" value="{{ $contact->contact_mobile }}">
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <span class="mb-2">Notes:
                                                        <input type="text" class="form-control edit_input" name="contact_notes{{ $contact->index }}"
                                                            id="contact_notes{{ $contact->index }}" value="{{ $contact->contact_notes }}">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="upload edit_input">
                                                @if(isset($contact->contact_image))
                                                    <img src="{{ asset($contact->contact_image) }}" alt="Product"
                                                        style="height: 100px; width:100px">
                                                @else
                                                    <img src="{{ asset('images/products/default.jpg') }}"
                                                        alt="Product" style="height: 100px; width:100px">
                                                @endif
                                                <label for="contact_image{{ $contact->index }}" class="edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                    <input id="contact_image{{ $contact->index }}" type="file" style="display: none"
                                                        name="contact_image{{ $contact->index }}">
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <hr>
                                </div>
                                
                            @endforeach
                        </div>

                        <div class="card m-2 p-3 view_span"  style="background-color:bisque;" id="view_contact_details">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Type:
                                                <span class="text-dark text-uppercase font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_type"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Description:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_description"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Name:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_name"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Email:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_email"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Title:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_title"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Address:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_address"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Phone:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_phone"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Job Position:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_job_position"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact State:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_state"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Zipcode:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_zip_code"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Country:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_country"></span>
                                            </span>
                                        </div>
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Mobile:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_mobile"></span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <span class="mb-2">Contact Notes:
                                                <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                                    id="view_contact_notes"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 mt-4">
                                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product"
                                        style="height: 100px; width:100px" id="view_contact_image">
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-link text-dark px-3 mb-0 edit_input" id="add_more" href="#">
                            <i class="fas fa-plus text-dark me-2" aria-hidden="true"></i>
                            Add Address
                        </a>
                    </div>

                    {{-- sales --}}
                    <div id="sales" class="container tab-pane fade"><br>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2">Salesperson:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="salesperson">{{ $customer->salesperson_name }}</span>
                                    <select name="salesperson" id="salesperson" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($salesperson as $sp)
                                            <option value="{{ $sp->unique_id }}"
                                                {{ $sp->unique_id == $customer->salesperson ? 'selected' : '' }}>
                                                {{ $sp->emp_name }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2">Delivery Method:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="deliveryMethod">{{ $customer->deliveryMethod }}</span>
                                    <select name="deliveryMethod" id="deliveryMethod" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($deliveryMethod as $dm)
                                            <option value="{{ $dm->method_type }}"
                                                {{ $dm->method_type == $customer->deliveryMethod  ? 'selected' : '' }}>
                                                {{ $dm->method_type }}</option>
                                        @endforeach
                                    </select>
                                </span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <span class="mb-2">Payment Terms:
                                    <span class="text-dark font-weight-bold ms-sm-2 view_span"
                                        id="paymentTerms">{{ $customer->payment_terms }}</span>
                                    <select name="paymentTerms" id="paymentTerms" class="form-control edit_input">
                                        <option value=""> --Select-- </option>
                                        @foreach($paymentTerms as $pt)
                                            <option value="{{ $pt->terms_of_payment }}"
                                                {{ $pt->terms_of_payment == $customer->payment_terms  ? 'selected' : '' }}>
                                                {{ $pt->terms_of_payment }}</option>
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
        $('#view_contact_details').hide();
    });

    window.count = {{ count($customer_contacts) }};
    console.log('count: ',window.count);
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
        for (let index = 1; index <= window.count; index++) {
            if ($(`#contact_type${index}`).text().trim() === 'contact') {
                contact_radio_click(index);
            } else {
                not_contact_radio_click(index);
            }
            
        }
    });

    $('#customertype1').click(function () {
        $('.company').hide();
    })
    $('#customertype2').click(function () {
        $('.company').show();
    })

    $('#discard').click(function () {
        location.reload();
    });


    function contact_radio_click(count) {
        $(`.contact`+count).show();
        $(`.notcontact`+count).hide();
    };
    function not_contact_radio_click(count) {
        $(`.contact`+count).hide();
        $(`.notcontact`+count).show();
    };

    // for adding more contacts
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

    window.viewContactId = 0;
    // view contact details on view mode
    function viewContactDetails(contact)
    {
        console.log('viewContactDetails : ',contact);
        if (contact.id == window.viewContactId)
        {
            // hide details
            window.viewContactId = 0;
            $('#view_contact_details').hide();
        }
        else
        {
            // show details
            window.viewContactId = contact.id;
            $('#view_contact_details').show();
            $('#view_contact_type').text(contact.contact_type);
            $('#view_contact_description').text(contact.contact_description);
            $('#view_contact_name').text(contact.contact_name);
            $('#view_contact_email').text(contact.contact_email);
            $('#view_contact_title').text(contact.contact_title);
            $('#view_contact_address').text(contact.contact_address);
            $('#view_contact_phone').text(contact.contact_phone);
            $('#view_contact_job_position').text(contact.contact_job_position);
            $('#view_contact_state').text(contact.contact_state);
            $('#view_contact_zip_code').text(contact.contact_zip_code);
            $('#view_contact_country').text(contact.contact_country);
            $('#view_contact_mobile').text(contact.contact_mobile);
            $('#view_contact_notes').text(contact.contact_notes);
            if(contact.contact_image !== null)
            {
                $('#view_contact_image').attr('src',`{{ asset('/') }}${contact.contact_image}`);
            }
            else
            {
                $('#view_contact_image').attr('src',`{{ asset('/') }}images/products/default.jpg`);
            }
        }
    }



    // function to get customer_contacts
    // function get_customer_contacts(){
    //     $.ajax({
    //             type: 'get',
    //             url: "{{ route('getCustomerContacts') }}",
    //             dataType: "json",
    //             data: {
    //                 customer_id: {{ $customer->id }}
    //             },
    //             success: function (customer_contacts) {
    //                 console.log(customer_contacts);
    //                 customer_contacts.forEach(contact => {
    //                     if (contact.contact_image === null) {
    //                         var image = `<img src=" {{ asset('images/products/default.jpg') }}" alt="Contact Image" style="height: 4rem; width:4rem">`
    //                     } else {
    //                         var image = `<img src="{{ asset('/') }}${contact.contact_image}" alt="Contact Image" style="height: 4rem; width:4rem">`
    //                     }
    //                     $('#customer_contacts_div').append(`
    //                             <div class="card m-2" style="background-color: lightsteelblue; width: 18rem">
    //                                 <a href="#" onclick="editContact()">
    //                                     <div class="card-body p-2">
    //                                         <div class="row">
    //                                             <div class="col-sm-3">
    //                                                 ${image}                                                    
    //                                             </div>
    //                                             <div class="col-sm-9">
    //                                                 <p class="mb-0 text-uppercase">${contact.contact_type}</p>
    //                                                 <p class="mb-0">${contact.contact_name}</p>
    //                                             </div>
    //                                         </div>
    //                                     </div>
    //                                 </a>
    //                             </div>
    //                     `);
    //                 });
    //             },
    //         });
    // }
    // get_customer_contacts();

    // function editContact()
    // {
    //     console.log('opening modal')
    //     $('#contactModal').modal();
    //     console.log('closing modal')
    // }

</script>
@endsection
