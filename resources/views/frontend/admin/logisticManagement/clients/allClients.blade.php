@extends('frontend.admin.layouts.master')

@section('page')
  <h6 class="font-weight-bolder mb-0">Clients</h6>
@endsection
@section('content')

        {{-- <form action="{{route('user')}}" method="GET">
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
        </form> --}}
        <br>
        <br>
        <div>
            <a href="{{ route('saveclient') }}" class="btn btn-primary">Add Client</a> 
        </div>
        <br>
        <table class="table mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Unique Id</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Name</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Email</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Phone No</th>
                    <th class="text-uppercase text-primary font-weight-bolder" scope="col">Operate</th>
                </tr>
            </thead>
            <tbody>
                @foreach($allClients as $c)
                <tr>
                    <td><p class="text-s font-weight-bold mb-0">{{$c->unique_id}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$c->firstname}} {{$c->lastname}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$c->email}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">{{$c->phone}}</p></td>
                    <td><p class="text-s font-weight-bold mb-0">
                        {{-- <a href="{{ url('/') }}/admin/details/{{$c->id}}">Details</a>
                        <a href="{{ url('/') }}/admin/edit/{{$c->id}}">Edit</a>
                        @if($c->status==1)
                            <a href="{{ url('/') }}/admin/userstatus/{{$c->id}}/0">active</a>
                        @else
                            <a href="{{ url('/') }}/admin/userstatus/{{$c->id}}/1">inactive</a>
                        @endif
                        </p> --}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
@endsection