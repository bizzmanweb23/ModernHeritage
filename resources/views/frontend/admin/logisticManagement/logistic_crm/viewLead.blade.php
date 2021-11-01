@extends('frontend.admin.layouts.master')

@section('page')
    <h6 class="font-weight-bolder mb-0">View</h6>
@endsection

@section('content')
@if ($lead->stage_id == 1)
    {{-- @if ()
        
    @else
        
    @endif --}}
    <a class="btn btn-primary" href="{{ url('/') }}/admin/logistic/newquotation/{{ $lead->id }}">New Quatation</a>
    <a class="btn btn-success" href="{{ url('/') }}/admin/logistic/update-stage/{{ $lead->id }}/2">Qualified for Logistic</a>
@elseif($lead->stage_id == 2)
    <a class="btn btn-success" href="{{ url('/') }}/admin/logistic/update-stage/{{ $lead->id }}/3">Add Assignee</a>
@endif
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <form action="{{ url('/') }}/admin/logistic/updaterequest/{{$lead->id}}" method="post">
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
                        <div class="col-md-6">
                            <span class="mb-2 ">Client Name:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="client_name_span">{{ $lead->client_name }}</span>
                                <input type="text" name="client_name" id="client_name"
                                    value="{{ $lead->client_name }}" placeholder="Client Name" readonly class="form-control"
                                    required />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Delivery To:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivered_to_span">{{ $lead->delivered_to }}</span>
                                <input type="text" name="delivered_to" id="delivered_to" value="{{ $lead->delivered_to }}"
                                    placeholder="Delivery To" class="form-control" required />
                            </span>
                        </div>                        
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2">Contact Person:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="contact_name_span">{{ $lead->contact_name }}</span>
                                <input type="text" name="contact_name" id="contact_name"
                                    value="{{ $lead->contact_name }}" placeholder="Contact Person Name"
                                    class="form-control" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2 ">Delivery Location:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivery_location_span">{{ $lead->delivery_location }}</span>
                                <input type="text" name="delivery_location" id="delivery_location" value="{{ $lead->delivery_location }}"
                                    placeholder="Delivery Location" class="form-control" required />
                            </span>
                        </div>
                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <span class="mb-2">Phone No:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="contact_phone_span">{{ $lead->contact_phone }}</span>
                                <input type="text" name="contact_phone" id="contact_phone"
                                    value="{{ $lead->contact_phone }}" placeholder="Contact phone"
                                    class="form-control" />
                            </span>
                        </div>
                        <div class="col-md-6">
                            <span class="mb-2">Delivery Phone No:
                                <span class="text-dark ms-sm-2 font-weight-bold hide_span"
                                    id="delivery_phone_span">{{ $lead->delivery_phone }}</span>
                                <input type="text" name="delivery_phone" id="delivery_phone"
                                    value="{{ $lead->delivery_phone }}" placeholder="Delivery phone no"
                                    class="form-control" />
                            </span>
                        </div>
                    </div>

                    {{-- <ul class="nav nav-tabs mt-4" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" data-bs-toggle="tab" href="#internal_notes">Internal Notes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#information">Extra Information</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content mb-3">
                        <div id="internal_notes" class="container tab-pane active"><br>
                            <h5>Internal Notes</h5>
                        </div>
                        <div id="information" class="container tab-pane fade"><br>
                            <h5>Contact Information</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="mb-2 ">Address:
                                        <span class="text-dark ms-sm-2 font-weight-bold"
                                            id="address_span">{{ $lead->address }}</span>
                                        <input type="text" name="address" id="address" value="{{ $lead->address }}"
                                            placeholder="Address" class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="mb-2 ">State:
                                        <span class="text-dark ms-sm-2 font-weight-bold"
                                            id="state_span">{{ $lead->state }}</span>
                                        <input type="text" name="state" id="state" value="{{ $lead->state }}"
                                            placeholder="State" class="form-control" />
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="mb-2 ">Country:
                                        <span class="text-dark ms-sm-2 font-weight-bold"
                                            id="country_span">{{ $lead->country }}</span>
                                        <input type="text" name="country" id="country" value="{{ $lead->country }}"
                                            placeholder="Country" class="form-control" />
                                    </span>
                                </div>
                                <div class="col-md-6">
                                    <span class="mb-2 ">Zipcode:
                                        <span class="text-dark ms-sm-2 font-weight-bold"
                                            id="zipcode_span">{{ $lead->zipcode }}</span>
                                        <input type="text" name="zipcode" id="zipcode" value="{{ $lead->zipcode }}"
                                            placeholder="Zipcode" class="form-control" />
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div> --}}
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
    });

    $('#edit').click(function () {
        $('#save').show();
        $('#discard').show();
        $('#edit').hide();
        $('#back').hide();
        $('input').show();
        $('.hide_span').hide();
    });

    $('#discard').click(function () {
        location.reload();
    });
</script>
@endsection