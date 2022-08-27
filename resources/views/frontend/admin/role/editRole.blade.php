@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('updateRole')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="role_name">Role Name</label>
                    <input type="hidden" class="form-control" id="id" name="id" placeholder="Enter a role name" value="{{$data->id}}" required>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter a role name" value="{{$data->name}}" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Status</label>

                      <select name="status" id="status" class="form-control">
             
                                <option value="1" @if($data->guard_name == 1) selected @endif> Active </option>
                                <option value="0" @if($data->guard_name == 0) selected @endif> Inactive </option>
                            </select>
                </div>
                <br> <br>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('roles')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection