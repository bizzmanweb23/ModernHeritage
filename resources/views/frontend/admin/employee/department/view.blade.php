@extends('frontend.admin.layouts.master')

@section('content')

<div class="card">
    <div class="card-body">

        <div class="ms-auto text-end">

            <a class="btn btn-link px-3 mb-0" id="back" href="{{ route('departments') }}"><i class="fa fa-arrow-left"></i>Back</a>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="department_name">Department Name:</label>
                    {{$data->department_name}}

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group company" id="employee">
                    <label for="manager">Manager:</label>
                    {{$data->manager}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group company" id="employee">
                    <label for="manager">Status:</label>
                    @if($data->status == 1)
                    Active
                    @else
                    Inactive
                    @endif
                </div>
            </div>
        </div>

    </div>
</div>
@endsection