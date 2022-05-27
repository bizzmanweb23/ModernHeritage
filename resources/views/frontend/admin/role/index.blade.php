@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css"/>
<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<div class="row">
    <div class="col-md-4">
        <a href="{{ route('createRole') }}" class="btn btn-primary">New Role</a>
    </div>


</div>



@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:15px;">



    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Title</th>
                <th>Status </th>
                <th>Give Permission </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($allRoles as $key=>$rl)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$rl->name}}</td>
                @if($rl->guard_name == 1)
                <td>Active</td>
                @else
                <td>Inactive</td>
                @endif
                <td>
           
                <a href="givePermission/{{$rl->id}}" class="btn btn-info" title="edit">Give Permitions</a>
              
              
                </td>
                <td>
                <a href="editRole/{{$rl->id}}"  title="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>
              
              <a href="javascript:void(0)" onclick="return delete_role(this.id)" id="{{$rl->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
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
    function delete_role(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteRole')}}",
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
           if(data == 1){

            location.reload();
           }

            }
        });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }

  
  
</script>



@endsection
