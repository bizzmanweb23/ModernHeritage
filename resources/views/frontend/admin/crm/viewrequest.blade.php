@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">View</h6>
@endsection

@section('content')
<a class="btn btn-primary" href="{{ url('/') }}/newquotation/{{ $lead->id  }}">New Quatation</a>
<div class="ms-auto text-end">
    <a href="#" class="btn btn-link text-dark px-3 mb-0">Quotation : {{ $quotation_count }}</a>
</div>
<div class="row">
    <div class="col-md-12 mt-3">
      <div class="card">
        <form action="{{ route('updaterequest') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id" value={{ $lead->id }}>
            <div class="card-header pb-0 px-3">
                <div class="d-flex flex-column">
                    <h6 class="mb-0" id="opportunity_span">{{ $lead->opportunity }}</h6>
                    <input type="text" name="opportunity" id="opportunity" value="{{ $lead->opportunity }}" style="width: 40em" placeholder="Opportunity"/>
                </div>
                <span class="mb-2 text-xs">
                    <span class="text-dark font-weight-bold ms-sm-2">₹</span>
                    <span class="text-dark font-weight-bold ms-sm-2" id="expected_price_span">{{ $lead->expected_price }}</span>
                    <input type="text" name="expected_price" id="expected_price" value="{{ $lead->expected_price }}" placeholder="Expected Price"/>
                    <span>&nbsp at</span>
                    <span class="text-dark font-weight-bold ms-sm-2" id="probability_span">{{ $lead->probability }}</span>
                    <input type="text" name="probability" id="probability" value="{{ $lead->probability }}" placeholder="Probability"/>
                    <span>%</span>
                </span>
            </div>
            <div class="card-body pt-4 p-3">
                <div class="d-flex flex-column">
                    <span class="mb-2 text-xs">Contact Name: 
                        <span class="text-dark font-weight-bold ms-sm-2" id="client_name_span">{{ $lead->client_name }}</span>
                        <input type="text" name="client_name" id="client_name" value="{{ $lead->client_name }}" placeholder="Contact Name"/>
                    </span>
                    <span class="mb-2 text-xs">Email Address:
                        <span class="text-dark ms-sm-2 font-weight-bold" id="email_span">{{ $lead->email }}</span>
                        <input type="text" name="email" id="email" value="{{ $lead->email }}" placeholder="Email"/>
                    </span>
                    <span class="mb-2 text-xs">Mobile Number:
                        <span class="text-dark ms-sm-2 font-weight-bold" id="mobile_no_span">{{ $lead->mobile_no }}</span>
                        <input type="text" name="mobile_no" id="mobile_no" value="{{ $lead->mobile_no }}" placeholder="Mobile No"/>
                    </span>
                    <span class="mb-2 text-xs">Priority:
                        <span class="text-dark ms-sm-2 font-weight-bold" id="priority_span">{{ $lead->priority }}</span>
                        <input type="text" name="priority" id="priority" value="{{ $lead->priority }}" placeholder="Priority"/>
                    </span>
                    <span class="mb-2 text-xs">Expected Closing:
                        <span class="text-dark ms-sm-2 font-weight-bold" id="expected_closing_span">{{ $lead->expected_closing }}</span>
                        <input type="date" name="expected_closing" id="expected_closing" value="{{ $lead->expected_closing }}" placeholder="Expected Closing"/>
                    </span>
                    <span class="mb-2 text-xs">Tags:
                        <span class="text-dark ms-sm-2 font-weight-bold" id="tag_span">
                            @foreach($selected_tags_name as $st)
                                {{ $st }} &nbsp;
                            @endforeach
                        </span>
                        <select multiple="multiple" name="tag[]" id="tag">
                            @foreach($tag as $t)
                                <option value="{{$t->id}}" {{(isset($selected_tags)&&in_array($t->id,$selected_tags))?'selected':''}}>{{$t->tag_name}}</option>
                            @endforeach
                        </select>
                    </span>
                </div>
                <div class="ms-auto text-end">
                    <a class="btn btn-link text-dark px-3 mb-0" id="edit" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                    <a class="btn btn-link text-dark px-3 mb-0" id="back" href="{{ route('getRequest') }}"><i class="fas fa-arrow-left text-dark me-2" aria-hidden="true"></i>Back</a>
                    <button class="btn btn-link text-dark px-3 mb-0" id="save"><i class="fas fa-save text-dark me-2" aria-hidden="true"></i>Save</button>
                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" id="discard" href="javascript:;"><i class="far fa-trash-alt me-2"></i>Discard</a>
                </div>
            </div>
        </form>
       </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('input').hide();
        $('#tag').hide();
        $('#save').hide();
        $('#discard').hide();
        $('#edit').click(function() {
            $('#opportunity_span').hide();
            $('#expected_price_span').hide();
            $('#probability_span').hide();
            $('#client_name_span').hide();
            $('#email_span').hide();
            $('#mobile_no_span').hide();
            $('#priority_span').hide();
            $('#expected_closing_span').hide();
            $('#tag_span').hide();
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

        $('#discard').click(function() {
            location.reload();
        });
    });
</script>
@endsection