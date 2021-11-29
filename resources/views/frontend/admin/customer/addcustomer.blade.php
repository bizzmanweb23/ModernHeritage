@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('savecustomer') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="customer_type" id="customertype1" value="individual" checked>
                <label class="form-check-label" for="customer_type">
                    Individual
                </label>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="customer_type" id="customertype2" value="company">
                <label class="form-check-label" for="customer_type">
                    Company
                </label>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="customer_image">{{ __('Customer Image') }}</label>
        <input id="customer_image" type="file" class="form-control" name="customer_image">
    </div>

    <div class="form-group">
        <label for="customer_name">Name</label>
        <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address"
            placeholder="Street Name, House No, Door No, City" required>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="State">
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode">
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" placeholder="Country">
    </div>

    <div class="form-group" id="gst">
        <label for="gst">GST</label>
        <input type="text" class="form-control" id="gst" name="gst" placeholder="GST">
    </div>

    <div class="form-group">
        <label for="mobile">Mobile</label>
        <div class="row">
            <div style="display: flex" class="col-12">
                <select name="country_code_m" class="form-control col-3" id="country_code_m">
                    <option value="">{{ __('country code') }}</option>
                    @foreach($countryCodes as $c)
                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="website">Website</label>
        <input type="text" class="form-control" id="website" name="website" placeholder="Website">
    </div>


    <br> <br>


    <button type="submit" class="btn btn-primary">Save</button>

    <a href="{{ route('allcustomer') }}" class="btn btn-primary">Back</a>

</form>
<script>
    $(document).ready(function () {
        $('#gst').hide();
        $('#customertype1').click(function () {
            $('#gst').hide();
        });

        $('#customertype2').click(function () {
            $('#gst').show();
        });
    });

</script>
@endsection
