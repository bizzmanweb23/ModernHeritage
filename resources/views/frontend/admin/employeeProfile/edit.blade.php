@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('updateAttendance') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Logout Date / Time</label>
                        <input type="datetime-local" name="logout_date" id="logout_date" value="" class="form-control" required />
                        <input type="hidden" name="id" id="id" value="{{$data->id}}" class="form-control" required />
                    </div>

                
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a class="btn btn-info" id="back" href="{{ route('giveAttendance') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection