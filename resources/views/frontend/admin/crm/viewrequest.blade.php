@extends('frontend.admin.layouts.master')

@section('page')
<h6 class="font-weight-bolder mb-0">View</h6>
@endsection

@section('content')
<a class="btn btn-primary" href="{{ url('/') }}/admin/newquotation/{{ $lead->id }}">New
    Quatation</a>
<a class="btn btn-primary" href="{{ url('/') }}/admin/updatestage/{{ $lead->id }}/4">Mark Won</a>
<a class="btn btn-primary" href="{{ url('/') }}/admin/updatestage/{{ $lead->id }}/0">Mark Lost</a>
<div class="ms-auto text-end">
    @foreach($stage as $st)
        @if($lead->stage_id == $st->id)
            <a href="{{ url('/') }}/admin/updatestage/{{ $lead->id }}/{{ $st->id }}"
                class="btn btn-link px-2 mb-0">{{ $st->stage_name }} <i class="fas fa-arrow-right"></i></a>
        @else
            <a href="{{ url('/') }}/admin/updatestage/{{ $lead->id }}/{{ $st->id }}"
                class="btn btn-link text-dark px-2 mb-0">{{ $st->stage_name }} <i class="fas fa-arrow-right"></i></a>
        @endif
    @endforeach
</div>
<div class="ms-auto text-end">
    <a href="{{ url('/') }}/admin/viewquotation/{{ $lead->id }}"
        class="btn btn-link text-dark px-3 mb-0">Quotation : {{ $quotation_count }}</a>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
        <div class="card">
            <form action="{{ route('updaterequest') }}" method="post">
                @csrf
                <input type="hidden" name="id" id="id" value={{ $lead->id }}>
                <div class="card-header pb-0 px-3">
                    <div class="ms-auto text-end">
                        @if($lead->stage_id == 4)
                            <h2 class="font-weight-bolder text-success text-gradient px-4">WON</h2>
                        @elseif($lead->stage_id == 0)
                            {
                            <h2 class="font-weight-bolder text-danger text-gradient px-4">LOST</h2>
                            }
                        @endif
                    </div>
                    <div class="d-flex flex-column">
                        <h4 class="mb-4" id="opportunity_span">{{ $lead->opportunity }}</h4>
                        <input type="text" name="opportunity" id="opportunity"
                            value="{{ $lead->opportunity }} required" style="width: 40em" placeholder="Opportunity"
                            class="form-control mb-4" />
                    </div>
                    <h6>
                        <span class="mb-2 mt-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-dark font-weight-bold ">₹</span>
                                    <span class="text-dark font-weight-bold "
                                        id="expected_price_span">{{ $lead->expected_price }}</span>
                                    <input type="text" name="expected_price" id="expected_price"
                                        value="{{ $lead->expected_price }}" placeholder="Expected Price"
                                        class="form-control" required />
                                </div>
                                <div class="col-md-6">
                                    <span>&nbsp at </span>
                                    <span class="text-dark font-weight-bold ms-sm-2"
                                        id="probability_span">{{ $lead->probability }} %</span>
                                    <input type="text" name="probability" id="probability"
                                        value="{{ $lead->probability }}" placeholder="Probability"
                                        class="form-control" required />
                                </div>
                            </div>


                        </span>
                    </h6>

                </div>
                <div class="card-body pt-4 p-3">
                    <div class="row">
                        <div class="col-md-4">
                            <span class="mb-2 ">Contact Name:
                                <span class="text-dark font-weight-bold ms-sm-2"
                                    id="client_name_span">{{ $lead->client_name }}</span>
                                <input type="text" name="client_name" id="client_name"
                                    value="{{ $lead->client_name }}" placeholder="Contact Name" class="form-control"
                                    required />
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="mb-2 ">Email Address:
                                <span class="text-dark ms-sm-2 font-weight-bold"
                                    id="email_span">{{ $lead->email }}</span>
                                <input type="text" name="email" id="email" value="{{ $lead->email }}"
                                    placeholder="Email" class="form-control" required />
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span class="mb-2 ">Mobile Number:
                                <span class="text-dark ms-sm-2 font-weight-bold"
                                    id="mobile_no_span">{{ $lead->mobile_no }}</span>
                                <input type="text" name="mobile_no" id="mobile_no" value="{{ $lead->mobile_no }}"
                                    placeholder="Mobile No" class="form-control" required />
                            </span>
                        </div>
                    </div>

                    <div class="d-flex flex-column mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="mb-2">Priority:
                                    <span class="text-dark ms-sm-2 font-weight-bold"
                                        id="priority_span">{{ $lead->priority }}</span>
                                    <input type="text" name="priority" id="priority" value="{{ $lead->priority }}"
                                        placeholder="Priority" class="form-control" />
                                </span>
                            </div>
                            <div class="col-md-6">
                                <span class="mb-2">Expected Closing:
                                    <span class="text-dark ms-sm-2 font-weight-bold"
                                        id="expected_closing_span">{{ $lead->expected_closing }}</span>
                                    <input type="date" name="expected_closing" id="expected_closing"
                                        value="{{ $lead->expected_closing }}" placeholder="Expected Closing"
                                        class="form-control" />
                                </span>
                            </div>
                        </div>

                        <span class="mb-2 mt-4">Tags:
                            <span class="text-dark ms-sm-2 font-weight-bold" id="tag_span">
                                @foreach($selected_tags_name as $st)
                                    {{ $st }} &nbsp;
                                @endforeach
                            </span>
                            <select multiple="multiple" name="tag[]" id="tag">
                                @foreach($tag as $t)
                                    <option value="{{ $t->id }}"
                                        {{ (isset($selected_tags)&&in_array($t->id,$selected_tags))?'selected':'' }}>
                                        {{ $t->tag_name }}</option>
                                @endforeach
                            </select>
                        </span>
                    </div>
                    <ul class="nav nav-tabs mt-4" role="tablist">
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
                    </div>
                    <div class="ms-auto text-end">
                        <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i
                                class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                        <a class="btn btn-link text-dark px-3 mb-0" id="back"
                            href="{{ route('getRequest') }}"><i
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
        $('input').hide();
        $('#tag').hide();
        $('#save').hide();
        $('#discard').hide();
        $('#edit').click(function () {
            $('#opportunity_span').hide();
            $('#expected_price_span').hide();
            $('#probability_span').hide();
            $('#client_name_span').hide();
            $('#email_span').hide();
            $('#mobile_no_span').hide();
            $('#priority_span').hide();
            $('#expected_closing_span').hide();
            $('#tag_span').hide();
            $('#address_span').hide();
            $('#state_span').hide();
            $('#country_span').hide();
            $('#zipcode_span').hide();
            $('#save').show();
            $('#discard').show();
            $('#edit').hide();
            $('#back').hide();
            $('input').show();
            $('#tag').select2({
                width: '50%',
                placeholder: "Select a tag",
                allowClear: true
            });
        });

        $('#discard').click(function () {
            location.reload();
        });
    });

</script>
@endsection
