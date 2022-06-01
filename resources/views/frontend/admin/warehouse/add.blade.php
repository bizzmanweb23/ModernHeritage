@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('saveWarehouse') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="card">

            <div class="card-body">
                <h5>Add Warehouse</h5>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                  
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m" required>
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Phone</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="country_code_p" class="form-control" id="country_code_p" required>
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                           
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" class="form-control" name="war_house_img" id="war_house_img" >
                        </div>
                    </div>
                   

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                        </div>
                    </div>

                    <h6>Address Details</h6>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>

                            <select name="country_id" class="form-control" id="country_id" required>
                                <option value="">--Select--</option>
                                @foreach($country as $c)
                                <option value="{{ $c->id }}">{{ $c->country }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="number" class="form-control" id="zipcode" name="zipcode" required>
                        </div>
                    </div>
                    <div class="ms-auto text-end">
                        <button class="btn btn-primary" id="save">Save</button>
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