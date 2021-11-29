@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ url('/') }}/admin/customeredit/{{ $customer->id }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    @if(isset($customer->customer_image))
        <div class="form-group">
            <img src="{{ asset($customer->customer_image) }}" alt="">
        </div>
    @endif
    @if($route=='customeredit')
        <div class="form-group">
            <label for="customer_image">{{ __('customer Image') }}</label>
            <input id="customer_image" type="file" class="form-control" name="customer_image">
        </div>
    @endif
    <div class="form-group">
        <label for="unique_id">Unique Id</label>
        <input type="text" class="form-control" id="unique_id" name="unique_id" value="{{ $customer->unique_id }}"
            readonly>
    </div>

    <div class="form-group">
        <label for="customer_name">Name</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $customer->customer_name }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>


    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" value="{{ $customer->email }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>

    @if($customer->customer_type == 'company')
        <div class="form-group">
            <label for="gst">GST</label>
            <input type="text" class="form-control" id="gst" name="gst" value="{{ $customer->gst }}"
                {{ ($route=='customeredit')?'':'readonly' }}>
        </div>
    @endif

    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" value="{{ $customer->website }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>


    <div class="form-group">
        <label for="service">Service</label>
        <select multiple="multiple" name="service[]" id="service" class="form-control"
            {{ ($route=='customeredit')?'':'disabled' }}>
            @foreach($service as $s)
                <option value="{{ $s->id }}"
                    {{ (isset($service)&&in_array($s->id,$v_service))?'selected':'' }}>
                    {{ $s->s_name }}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group">
        <label for="mobile">Mobile</label>
        <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $customer->mobile }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state" value="{{ $customer->state }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{ $customer->zipcode }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ $customer->country }}"
            {{ ($route=='customeredit')?'':'readonly' }}>
    </div>




    <br> <br>
    @if($route == 'customeredit')

        <button type="submit" class="btn btn-primary">Save</button>

    @endif

    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

</form>
<script>
    $('#service').select2({
        width: '100%',
        placeholder: "Select a service",
        allowClear: true
    });

</script>
@endsection
