@extends('frontend.admin.layouts.master')

@section('content')


<div class="container">
    <div class="card">

        <div class="card-body">
        
            <div class="ms-auto text-end">
                    
                    <a class="btn btn-link" id="back" href="{{ route('index') }}"><i class="fa fa-arrow-left"></i></a>
                </div>
            <div class="row mt-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name:</label>
                        {{$data->user_name}}

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email:</label>
                        {{$data->email}}
                    </div>
                </div>

            </div>
            <div class="row mt-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mobile">Mobile:</label>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>User Image:</label>
                        <img src="{{ asset($data->user_image) }}" alt="User Image" style="height: 6rem; width:6rem">
                    </div>
                </div>
            </div>
            <div class="row mt-1">

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Role:</label>
                        {{$data->name}}
                    </div>
                </div>
                <div class="col-md-6">
                    <label>Status:</label>
                    @if($data->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger"> Inactive </span>
                    @endif

                </div>
            </div>


            <hr>
            <h4>Address Details</h4><br>
            <div class="row mt-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address Line 1:</label>
                        {{$data->address_1}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address Line 2:</label>
                        {{$data->address_2}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address Line 3:</label>
                        {{$data->address_3}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Country:</label>
                     
                        {{$data->country}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>State:</label>
                        {{$data->state}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Zipcode:</label>
                        {{$data->zipcode}}
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>




@endsection