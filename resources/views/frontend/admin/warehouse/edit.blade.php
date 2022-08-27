@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateWarehouse') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h5>Edit Warehouse</h5>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="hidden" class="form-control" id="id" name="id" value="{{$data->id}}">
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->name}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" value="{{$data->email}}"required>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <div class="col-md-3">
                                <?php
                                  $cod= substr($data->mobile_no,0, -10);
                                   
                                        ?>
                                    <select name="country_code_m" class="form-control" id="country_code_m" required>
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif >+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile_no" name="mobile_no" value="<?php echo substr($data->mobile_no,-10); ?>" placeholder="Mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Phone</label>
                            <div class="row">
                                <div class="col-md-3">
                                <?php
                                  $cod= substr($data->phone,0, -10);
                                   
                                        ?>
                                    <select name="country_code_p" class="form-control" id="country_code_p" required>
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}" @if($cod == $c->code) selected @endif >+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo substr($data->phone,-10); ?>"placeholder="Phone" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                                </div>

                            </div>
                        </div>
                    </div>
              
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1" @if($data->status == 1) selected @endif>Active</option>
                                <option value="0" @if($data->status == 0) selected @endif>Inactive</option>

                            </select>
                        </div>
                    </div>

                    <h6>Address Details</h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" value="{{$data->address_1}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" value="{{$data->address_2}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" value="{{$data->address_3}}">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state" value="{{$data->state}}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>

                            <select name="country_id" class="form-control" id="country_id" required>
                                <option value="">--Select--</option>
                                @foreach($country as $c)
                                <option value="{{ $c->id }}" @if($data->country_id == $c->id) selected @endif>{{ $c->country }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="number" class="form-control" id="zipcode" name="zipcode" value="{{$data->zipcode}}" required>
                        </div>
                    </div>
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('wareHouses') }}">Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</form>
<script>
     @if($errors->any())
        @foreach($errors->all() as $error)
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
            toastr.success("{{ $error }}");
        @endforeach
    @endif
   
</script>

@endsection