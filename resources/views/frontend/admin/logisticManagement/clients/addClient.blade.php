@extends('frontend.admin.layouts.master')

@section('content')
<form action="{{ route('saveclient') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row mb-2">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="client_type" id="individual" value="individual" checked>
            <label class="form-check-label" for="client_type">
                Individual
            </label>
            &nbsp &nbsp &nbsp
        </div>
        <div class="form-check">    
            <input class="form-check-input" type="radio" name="client_type" id="company" value="company">
            <label class="form-check-label" for="client_type">
                Company
            </label>
        </div>
    </div>                                      
    <div class="form-group">
        <label for="client_image">{{ __('Client Image') }}</label>
        <input id="client_image" type="file" class="form-control" name="client_image">
    </div>

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter first name" required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter last name" required>
    </div>

    <div class="form-group">
        <label for="address">Address 1</label>
        <input type="text" class="form-control" id="address" name="address"
            placeholder="Street Name, House No, Door No, City" required>
    </div>

    <div class="form-group">
        <label for="address2">Address 2</label>
        <input type="text" class="form-control" id="address2" name="address2"
            placeholder="Street Name, House No, Door No, City" required>
    </div>

    <div class="form-group">
        <label for="state">State</label>
        <input type="text" class="form-control" id="state" name="state" placeholder="State" required>
    </div>

    <div class="form-group">
        <label for="zipcode">Zipcode</label>
        <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" required>
    </div>

    <div class="form-group">
        <label for="country">Country</label>
        <input type="text" class="form-control" id="country" name="country" placeholder="Country" required>
    </div>

    <div class="form-group" id="gst">
        <label for="gst">GST</label>
        <input type="text" class="form-control" id="gst" name="gst" placeholder="GST">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <div class="row">
            <div style="display: flex" class="col-12">
                <select name="country_code" class="form-control col-3" id="country_code" required>
                    <option value="">--select--</option>
                    @foreach($countryCodes as $c)
                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone no" required>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>


    <br> <br>


    <button type="submit" class="btn btn-primary">Save</button>

    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

</form>

<script>
    $(document).ready(function () {
        $('#gst').hide();
        $('#individual').click(function () {
            $('#gst').hide();
        });

        $('#company').click(function () {
            $('#gst').show();
        });
    });

</script>
@endsection
