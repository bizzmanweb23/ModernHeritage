@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">
  
        <div class="card-body">
        <h5>View Claim</h5>

            <div class="row">
                <div class="ms-auto text-end">


                    <a class="btn btn-link" id="back" href="{{ route('claims') }}"><i class="fa fa-arrow-left"></i>Back</a>

                </div>
                <div class="col-md-6">
                    <label>Employee</label><br>
                    {{$claim->emp_name}}

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Claiming Amount (per month) (for drivers per trip charge):</label><br>
                        {{$claim->claiming_amount}}
                    </div>

                </div>
                <div class="col-md-6">
                    <label>Upload Application</label>
                    <a href="{{ asset($claim->app_file) }}" target="_blank"><i class="fa fa-file"></i></a>

                </div>
                <div class="col-md-6">
                    <label>Comment</label><br>
                    {{$claim->comment}}

                </div>


            </div><br>


        </div>
    </div>
</div>

@endsection