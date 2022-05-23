@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<form action="" method="GET">
    @csrf
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('addUser') }}" class="btn btn-primary">Add User</a>
        </div>
     
    </div>
</form>
<div class="container card" style="padding:16px">

        
        <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
      
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach($allUser as $key=>$u )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td> @if(isset($u->image))
                    <img src="{{ asset($u->image) }}" alt="Product" style="height: 6rem; width:6rem">
                    @else
                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem">
                    @endif
                </td>
                <td>{{$u->user_name}}</td>
                <td>{{ $u->email  }}</td>
                <td>{{ $u->user_mobile  }}</td>
          
                <td>
                    <a href="editCustomer/{{$u->id}}"  title="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                    <a href="viewCustomer/{{$u->id}}"  title="view"><span class="badge badge-info"><i class="fa fa-eye"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_user(this.id)" id="{{$u->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
                </td>


            </tr>
            @endforeach


        </tbody>
    </table>



</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
     $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    </script>
@endsection