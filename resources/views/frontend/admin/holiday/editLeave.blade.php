@extends('frontend.admin.layouts.master')
@section('content')

<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('updateLeave') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>No of Casual Leave</label>
                        <input type="number" name="casual_leave" id="casual_leave" value="{{$data->casual_leave}}" class="form-control" required />
                        <input type="hidden" name="id" id="id" value="{{$data->id}}" class="form-control" required />
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No of Sick Leave</label>
                            <input type="number" name="sick_leave" id="sick_leave" value="{{$data->sick_leave}}" class="form-control" required />
                        </div>

                    </div>
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('leaveStructure') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection