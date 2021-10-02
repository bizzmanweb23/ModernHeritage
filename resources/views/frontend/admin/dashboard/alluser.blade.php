@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Clients</h6>
@endsection
@section('content')

        <form action="{{route('user')}}" method="GET">
            @csrf
            <div class="form-group">
                <label for="unique_id">Unique Id</label>
                <input type="text" class="form-control" id="unique_id" placeholder="Enter unique id" name="unique_id">
            </div>

            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" placeholder="Enter first name" name="firstname">
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <br>
        <br>
        <div>
            <a href="{{url('/')}}/register/any" class="btn btn-primary">Add User</a> 
            
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">Create Role</a> 
        </div>
        <br>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Unique Id</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Firstname</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Lastname</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Email</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Phone No</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Operate</th>

                </tr>
            </thead>
            <tbody>
                @foreach($allUser as $u)
                <tr>
                    <td><p class="text-s font-weight-bold mb-0">{{$u->unique_id}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$u->firstname}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$u->lastname}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$u->email}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$u->phone}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">
                        <a href="{{url('/')}}/details/{{$u->id}}">Details</a>
                        <a href="{{url('/')}}/edit/{{$u->id}}">Edit</a>
                        @if($u->status==1)
                            <a href="{{url('/')}}/userstatus/{{$u->id}}/0">active</a>
                        @else
                            <a href="{{url('/')}}/userstatus/{{$u->id}}/1">inactive</a>
                        @endif
                        </p>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{route('saveRole')}}" method="POST">
            @csrf
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add Roles</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>  
            <div class="row">
                <div class="col-md-4"><label for="mobile_no">Role Name</label></div>
                <div class="col-md-8"><input type="text" class="form-control" id="role_name" name="role_name" placeholder="Enter a role name"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            
        </form>
      </div>
    </div>
  </div>
@endsection