@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('message') }}</strong>

        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5>Change Password</h5>
                <div class="row mt-1">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">New Password:</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" value="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Confirm Password:</label>
                            <input type="password" class="form-control" value="" id="con_password" name="con_password">
                        </div>
                    </div>
                </div>

                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Update</button>

                </div>


            </div>
        </div>
    </div>
</form>
@endsection