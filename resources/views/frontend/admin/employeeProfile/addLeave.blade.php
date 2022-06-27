@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('postLeave') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Period</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <label>Type</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="">--Select--</option>
                            <option value="1">Casual Leave</option>
                            <option value="2">Sick Leave</option>
                        </select>

                    </div>
                    <div class="col-md-6">
                        <label>Reason</label>
 
                       <textarea class="form-control" name="reason" id="reason"></textarea>
                    </div>


                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('employeeLeave') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection