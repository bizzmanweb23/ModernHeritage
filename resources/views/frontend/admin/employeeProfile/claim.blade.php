@extends('frontend.admin.layouts.master')
@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h5>Employee Claims</h5>

<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addClaims') }}" class="btn btn-primary">Add Claims</a>
    </div>


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
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Claiming Amount</th>
                <th>Status </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
       
        @foreach($claims as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ld->unique_id}}</td>
                <td>{{$ld->emp_name}}</td>
                <td>{{$ld->claiming_amount}}</td>
                
                @if($ld->status == 1)
                <td><span class="badge badge-success">Approved</span></td>
                @else
                <td><span class="badge badge-danger">Not Approved</span></td>
                @endif
                <td>

                    <a href="editClaim/{{$ld->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_claim(this.id)" id="{{$ld->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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

    function delete_claim(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteClaim')}}",
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
   
   
</script>


@endsection