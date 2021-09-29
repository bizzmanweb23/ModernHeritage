@extends('frontend.admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
    </div>
    <div class="content-body">
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
            <a href="{{url('/')}}/register/client" class="btn btn-primary">Add User</a> 
            
            <a href="{{route('createRole')}}" class="btn btn-primary">Create Role</a> 
        </div>
        <br>
        <div>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Unique Id</th>
                        <th scope="col">Firstname</th>
                        <th scope="col">Lastname</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone No*</th>
                        <th scope="col">Operate</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($allUser as $u)
                    <tr>
                        <td>{{$u->unique_id}}</td>
                        <td>{{$u->firstname}}</td>
                        <td>{{$u->lastname}}</td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->phone}}</td>
                        <td><a href="{{url('/')}}/details/{{$u->id}}">Details</a>
                            <a href="{{url('/')}}/edit/{{$u->id}}">Edit</a>
                            @if($u->status==1)
                                <a href="{{url('/')}}/userstatus/{{$u->id}}/0">active</a>
                            @else
                                <a href="{{url('/')}}/userstatus/{{$u->id}}/1">inactive</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection