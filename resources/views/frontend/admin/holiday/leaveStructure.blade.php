@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Leave Structure</h5>
<div class="row">
    @if(count($data)==0)
    <div class="col-md-4">
        <a href="{{ route('addleaveStructure') }}" class="btn btn-primary">Create Leave Structure</a>
    </div>
    @endif


</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">
    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>No of Casual Leave</th>
                <th>No of Sick Leave</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$ls)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ls->casual_leave}}</td>
                <td>{{$ls->sick_leave}}</td>
               
                <td>
                    <a href="editLeave/{{$ls->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit"></i></span></a>

                    <a href="javascript:void(0)" onclick="return delete_leave_structure(this.id)" id="{{$ls->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>
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
    function delete_leave_structure(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteLeaveStructure')}}",
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