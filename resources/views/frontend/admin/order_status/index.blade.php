@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addOrderStatus') }}" class="btn btn-primary">Create Order Status</a>
    </div>


</div>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif

<div class="card" style="padding:15px;">





    <table class="table table-bordered table-hover" id="tableId" style="overflow: auto; width: 100%;  text-align: center;">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Order Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$row)
            <tr>
                <th>{{$key+1}}</th>
                <th>{{$row->order_status}}</th>
                <th>
                <a href="editStatus/{{$row->id}}" title="edit" ><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                <a href="deleteStatus/{{$row->id}}" title="delete" ><span class="badge badge-danger"><i class="fas fa-trash"></i></span></a> 
               
                </th>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable();
    });

  
</script>


@endsection