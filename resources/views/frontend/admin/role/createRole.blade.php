@extends('frontend.admin.layouts.master')

@section('content')

<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('saveRole')}}" method="POST">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="role_name">Role Name</label>
                    <input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter a role name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="role_name">Status</label>

                      <select name="status" id="status" class="form-control">
             
                                <option value="1"> Active </option>
                                <option value="0"> Inactive </option>
                            </select>
                </div>
                <br> <br>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <a href="{{route('roles')}}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection