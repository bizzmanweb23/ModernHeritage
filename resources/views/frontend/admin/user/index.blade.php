@extends('frontend.admin.layouts.master')

@section('content')
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addUser') }}" class="btn btn-primary">Add User</a>
        </div>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <div style="display: flex; flex-wrap: no-wrap">
                <input type="text" class="form-control mr-1" id="user_name" placeholder="Search..."
                    name="user_name">
                <div>
                    <button type="submit" style="border-radius: 10px">
                        <i class="fas fa-search fa-2x"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection