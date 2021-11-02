@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">View</h6>
@endsection

@section('content')
@if($lead->stage_id == 1)
    @if(isset($lead->quotation_id))
        <a class="btn btn-success"
            href="{{ url('/') }}/admin/logistic/update-stage/{{ $lead->id }}/2">Qualified for
            Logistic</a>
    @else
        <a class="btn btn-primary"
            href="{{ url('/') }}/admin/logistic/newquotation/{{ $lead->id }}">New Quatation</a>
    @endif
@elseif($lead->stage_id == 2)
    <a class="btn btn-success"
        href="{{ url('/') }}/admin/logistic/update-stage/{{ $lead->id }}/3">Add Assignee</a>
@endif
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card container-fluid">
            <form action="{{ url('/') }}/admin/logistic/updaterequest/{{ $lead->id }}"
                method="post">
                @csrf
                <input type="hidden" name="lead_id" id="lead_id" value={{ $lead->id }}>
                <input type="hidden" name="client_id" id="client_id" value={{ $lead->client_id }}>
                <div class="card-header pb-0 px-3">
                    {{-- <div class="ms-auto text-end">
@if($lead->stage_id == 4)
                            <h2 class="font-weight-bolder text-success text-gradient px-4">WON</h2>
@elseif($lead->stage_id == 0)
                            {
                            <h2 class="font-weight-bolder text-danger text-gradient px-4">LOST</h2>
                            }
@endif
                    </div> --}}
                    <div class="d-flex flex-column">
                        <h4 class="mb-3" id="unique_id_span">{{ $lead->unique_id }}</h4>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="mb-2 ">Client Name:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="client_name_span">{{ $lead->client_name }}</span>
                                <input type="text" name="client_name" id="client_name"
                                    value="{{ $lead->client_name }}" placeholder="Client Name" readonly
                                    class="form-control" required />
                            </span>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <span class="mb-2 ">Delivery To:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivered_to_span">{{ $lead->delivered_to }}</span>
                                <input type="text" name="delivered_to" id="delivered_to"
                                    value="{{ $lead->delivered_to }}" placeholder="Delivery To" class="form-control"
                                    required />
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="mb-2">Contact Person:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="contact_name_span">{{ $lead->contact_name }}</span>
                                <input type="text" name="contact_name" id="contact_name"
                                    value="{{ $lead->contact_name }}" placeholder="Contact Person Name"
                                    class="form-control" />
                            </span>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <span class="mb-2 ">Delivery Location:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivery_location_span">{{ $lead->delivery_location }}</span>
                                <input type="text" name="delivery_location" id="delivery_location"
                                    value="{{ $lead->delivery_location }}" placeholder="Delivery Location"
                                    class="form-control" required />
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-5">
                            <span class="mb-2">Phone No:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="contact_phone_span">{{ $lead->contact_phone }}</span>
                                <input type="text" name="contact_phone" id="contact_phone"
                                    value="{{ $lead->contact_phone }}" placeholder="Contact phone"
                                    class="form-control" />
                            </span>
                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-5">
                            <span class="mb-2">Delivery Phone No:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivery_phone_span">{{ $lead->delivery_phone }}</span>
                                <input type="text" name="delivery_phone" id="delivery_phone"
                                    value="{{ $lead->delivery_phone }}" placeholder="Delivery phone no"
                                    class="form-control" />
                            </span>
                        </div>
                    </div>

                    <div class="hide_div mt-4">
                        <h5 class="mb-2">Extra Informations: </h5>
                        @if($lead->stage_id == 1)
                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup From :
                                        <input type="text" name="pickup_from" id="pickup_from"
                                            value="{{ $lead->pickup_from }}" placeholder="Pickup From"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Phone :
                                        <input type="text" name="pickup_phone" id="pickup_phone"
                                            value="{{ $lead->pickup_phone }}" placeholder="Pickup Phone"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Location :
                                        <input type="text" name="pickup_location" id="pickup_location"
                                            value="{{ $lead->pickup_location }}" placeholder="Pickup Location"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Email:
                                        <input type="text" name="pickup_email" id="pickup_email"
                                            value="{{ $lead->pickup_email }}" placeholder="Pickup Email"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Email:
                                        <input type="text" name="delivery_email" id="delivery_email"
                                            value="{{ $lead->delivery_email }}" placeholder="Delivery Email"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Address 1:
                                        <input type="text" name="pickup_add_1" id="pickup_add_1"
                                            value="{{ $lead->pickup_add_1 }}" placeholder="Pickup Address 1"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Address 1:
                                        <input type="text" name="delivery_add_1" id="delivery_add_1"
                                            value="{{ $lead->delivery_add_1 }}" placeholder="Delivery Address 1"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Address 2:
                                        <input type="text" name="pickup_add_2" id="pickup_add_2"
                                            value="{{ $lead->pickup_add_2 }}" placeholder="Pickup Address 2"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Address 2:
                                        <input type="text" name="delivery_add_2" id="delivery_add_2"
                                            value="{{ $lead->delivery_add_2 }}" placeholder="Delivery Address 2"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Address 3:
                                        <input type="text" name="pickup_add_3" id="pickup_add_3"
                                            value="{{ $lead->pickup_add_3 }}" placeholder="Pickup Address 3"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Address 3:
                                        <input type="text" name="delivery_add_3" id="delivery_add_3"
                                            value="{{ $lead->delivery_add_3 }}" placeholder="Delivery Address 3"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Pin:
                                        <input type="text" name="pickup_pin" id="pickup_pin"
                                            value="{{ $lead->pickup_pin }}" placeholder="Pickup Pin"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Pin:
                                        <input type="text" name="delivery_pin" id="delivery_pin"
                                            value="{{ $lead->delivery_pin }}" placeholder="Delivery Pin"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup State:
                                        <input type="text" name="pickup_state" id="pickup_state"
                                            value="{{ $lead->pickup_state }}" placeholder="Pickup State"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery State:
                                        <input type="text" name="delivery_state" id="delivery_state"
                                            value="{{ $lead->delivery_state }}" placeholder="Delivery State"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-5">
                                    <span class="mb-2">Pickup Country:
                                        <input type="text" name="pickup_country" id="pickup_country"
                                            value="{{ $lead->pickup_country }}" placeholder="Pickup Country"
                                            class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-5">
                                    <span class="mb-2">Delivery Country:
                                        <input type="text" name="delivery_country" id="delivery_country"
                                            value="{{ $lead->delivery_country }}" placeholder="Delivery Country"
                                            class="form-control" />
                                    </span>
                                </div>
                            </div>
                            
                        @endif
                    </div>

                    <div class="ms-auto text-end">
                        <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                                class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                            href="{{ route('logistic_crm') }}"><i
                                class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                        <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2"
                                aria-hidden="true"></i>Save</button>
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i
                                class="far fa-trash-alt me-2"></i>Discard</a>
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
        $('input').hide();
        $('.hide_div').hide();
    });

    $('#edit').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#edit').hide();
        $('#back').hide();
        $('input').show();
        $('.hide_span').hide();
        $('.hide_div').show();
    });

    $('#discard').click(function () {
        location.reload();
    });

</script>
@endsection
