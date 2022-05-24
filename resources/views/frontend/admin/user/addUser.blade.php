@extends('frontend.admin.layouts.master')

@section('content')
<style>
    .upload {
        height: 100px;
        width: 100px;
        position: relative;
    }

    .upload:hover>.edit {
        display: block;
    }

    .edit {
        display: none;
        position: absolute;
        top: 1px;
        right: 1px;
        cursor: pointer;
    }
</style>
<form action="{{ route('saveUser') }}" method="POST" enctype="multipart/form-data" id="addUser">
    @csrf
    <div class="container">
        <div class="card">
            <div class="card-body">

                @if($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="user_name">Name</label>
                            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <div class="upload">
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 100px; width:100px">
                            <label for="user_image" class="edit">
                                <i class="fas fa-pencil-alt"></i>
                                <input id="user_image" type="file" style="display: none" name="user_image">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email</label>
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
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="mobile">Role</label>
                            <select name="role_id" class="form-control" id="role_id">
                                <option value="">--Select--</option>
                                @foreach($roles as $r)
                                <option value="{{ $r->id }}">{{ $r->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required data-rule-equalTo="#password">
                        </div>
                    </div>
                </div>

                <hr>
                <h4>Address Details</h4>
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Address Line 1</label>
                            <input type="password" class="form-control" id="address_1" name="address_1" placeholder="Address Line 1" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Address Line 2</label>
                            <input type="password" class="form-control" id="address_2" name="address_2" placeholder="Address Line 2" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Address Line 3</label>
                            <input type="password" class="form-control" id="address_3" name="address_3" placeholder="Address Line 3" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Country</label>
                            
                            <input type="password" class="form-control" id="country" name="country" placeholder="Country" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">State</label>
                            <input type="password" class="form-control" id="state" name="state" placeholder="State" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">Zipcode</label>
                            <input type="password" class="form-control" id="zipcode" name="zipcode" placeholder="Zipcode" required>
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


@endsection