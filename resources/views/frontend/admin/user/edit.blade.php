@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('update_user') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <div class="container">
        <div class="card">
       
            <div class="card-body">
            <h5>Edit User</h5>
            <input type="hidden" class="form-control" id="id" name="id" placeholder="Name" value="{{$user->id}}">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" value="{{$user->user_name}}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}"required>
                        </div>
                    </div>
                   
                </div>
                <div class="row mt-1">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Mobile</label>
                            <div class="row">
                                <?php
                             $cod= substr($user->mobile,0, -10);
                          

                                ?>
                                <div class="col-md-3">
                                    <select name="country_code_m" class="form-control" id="country_code_m">
                                        <option value="">--Select--</option>
                                        @foreach($countryCodes as $c)
                                        <option value="+{{ $c->code }}" @if($c->code == $cod) selected @endif>+{{ $c->code }}({{ $c->name }})
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control"  value="<?php echo substr($user->mobile,-10); ?>"id="mobile" name="mobile" placeholder="Mobile" maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')"required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Image</label>
                            <input type="file" class="form-control" id="user_image" name="user_image" >
                            <input type="hidden" class="form-control" id="user_old_image" name="user_old_image" value="{{$user->user_image}}">
                            <br>
                            <img src="{{ asset($user->user_image) }}" alt="User Image" style="height: 6rem; width:6rem">
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
             
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" class="form-control" id="role_id">
                                <option value="">--Select--</option>
                                @foreach($roles as $r)
                                <option value="{{ $r->id }}" @if($user->role_id == $r->id) selected @endif>{{ $r->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <label>Status</label>
                            <select name="status" id="status" class="form-control">

                                <option value="1" @if($user->status == 1)selected @endif>Active</option>
                                <option value="0" @if($user->status == 0)selected @endif>Inactive</option>

                            </select>
                      
                    </div>
                </div>
               

                <hr>
                <h4>Address Details</h4>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 1</label>
                            <input type="text" class="form-control" id="address_1" name="address_1" placeholder="Address Line 1" value="{{$user->address_1}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 2</label>
                            <input type="text" class="form-control" id="address_2" name="address_2" placeholder="Address Line 2" value="{{$user->address_2}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Address Line 3</label>
                            <input type="text" class="form-control" id="address_3" name="address_3" placeholder="Address Line 3" value="{{$user->address_3}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            
                            <select name="country" class="form-control" id="country" >
                                <option value="">--Select--</option>
                                @foreach($countries as $c)
                                <option value="{{ $c->id }}" @if($c->id == $user->country) selected @endif>{{ $c->country }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="State" value="{{$user->state}}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Zipcode</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode"  maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="{{$user->zipcode}}">
                        </div>
                    </div>
                </div>
                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Update</button>
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