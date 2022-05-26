@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('save_user') }}" method="POST" enctype="multipart/form-data" id="addUser">
    @csrf
    <div class="container">
        <div class="card">
       
            <div class="card-body">
            <h5>New User</h5>
              
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                    </div>
                   
                </div>
                <div class="row mt-1">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}">+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')"required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Image</label>
                            <input type="file" class="form-control" id="user_image" name="user_image" >
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
             
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="user_type" name="user_type" >
                            <span style="font-size:12px;">Eg:Hr/admin/director/Sales</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1">Active</option>
                                <option value="0">Inactive</option>

                            </select>
                      
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required data-rule-equalTo="#password">
                        </div>
                    </div>
                </div>

                <hr>
                <h4>Address Details</h4>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" placeholder="Address Line 1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Address Line 2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" placeholder="Address Line 3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            
                            <select name="country" class="form-control" id="country" required>
                                <option value="">--Select--</option>
                                @foreach($countries as $c)
                                <option value="{{ $c->id }}">{{ $c->country }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode"  maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        </div>
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Save</button>
                    <a class="btn btn-info" id="back" href="{{ route('index') }}">Back</a>
                </div>


            </div>
        </div>
    </div>
</form>
<script>
    $('#country').select2({
        width: '100%',
        height:'150px',
        placeholder: "Select a Country",
        allowClear: true
    });
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