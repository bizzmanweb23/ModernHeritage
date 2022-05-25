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
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:16px">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-5">
                    <select name="role" class="form-control" id="role">
                        <option value="all">All</option>
                        @foreach($roles as $key=>$st)
                        <option value="{{$st->id}}" @if(isset($_GET['role']) && $_GET['role']==$st->id )selected @endif>{{$st->name}}</option>
                        @endforeach
                    </select>
                </div>


            </div>
        </div>
    </form>
    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach($allUser as $key=>$u )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td> @if(isset($u->user_image))
                    <img src="{{ asset($u->user_image) }}" alt="User Image" style="height: 6rem; width:6rem">
                    @else
                    <img src="{{ asset('images/products/default.jpg') }}" alt="Product" style="height: 5rem; width:5rem">
                    @endif
                </td>
                <td>{{$u->user_name}}</td>
                <td>{{ $u->email  }}</td>
                <td>+{{ $u->mobile  }}</td>
                @if($u->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
                <td>
                    <a href="editUser/{{$u->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
                    <a href="viewUser/{{$u->id}}" title="view"><span class="badge badge-info"><i class="fa fa-eye"></i></span></a>
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

    function delete_user(id) 
    {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteUser')}}",
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {

                        location.reload();
                    }

                }
            });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }
    $('#role').change(function(e) {
        e.preventDefault();
        var role = $('#role').val();

        $.ajax({
            url: "{{route('index')}}",
            type: 'GET',
            data: {
                role: role
            },
            success: function(data) {
                location.replace('?role=' + role);

            }
        });


    });
</script>
@endsection