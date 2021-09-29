@extends('frontend.admin.layouts.master')

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
            <a href="{{url('/')}}/register/client" class="btn btn-primary">Add User</a> 
            
            <a href="{{route('createRole')}}" class="btn btn-primary">Create Role</a> 
        </div>
        <br>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
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
            </div>
        </div>

@endsection