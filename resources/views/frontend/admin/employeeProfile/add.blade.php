@extends('frontend.admin.layouts.master')
@section('content')


<div class="container">

    <div class="card">

        <div class="card-body">

            <form action="{{ route('postAttendance') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label>Login Date / Time</label>
                        <input type="datetime-local" name="login_date" id="login_date" value="" class="form-control" required />

                    </div>

                
                </div><br>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a class="btn btn-info" id="back" href="{{ route('giveAttendance') }}">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection