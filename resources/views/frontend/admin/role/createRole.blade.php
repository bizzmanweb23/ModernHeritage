@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
        <form action="{{route('saveRole')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="role_name">Role Name</label>
                <input type="text" class="form-control" id="role_name" name="role_name"  placeholder="Enter a role name" required>
            </div>
            <br> <br>

            <button type="submit" class="btn btn-primary">Save</button>

            <a href="{{route('users')}}" class="btn btn-primary">Back</a>
            
        </form>
    </div>
</div>
@endsection