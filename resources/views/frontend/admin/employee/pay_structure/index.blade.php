@extends('frontend.admin.layouts.master')

@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Pay Structure</h5>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('payStructureAdd') }}" class="btn btn-primary">Add Pay Structure</a>
    </div>


</div>

<div class="card" style="padding:15px;">





    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Year</th>
                <th>Commission</th>
                <th>CPF</th>
                <th>Insurance</th>
                <th>Medical Leave Entitlement</th>
                <th>Medical Allowance</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
        @foreach($data as $key=>$pay_str )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td>{{$pay_str->year }}</td>
                <td>{{$pay_str->commission }}</td>
                <td>{{$pay_str->cpf }}</td>
                <td>{{$pay_str->insurance }}</td>
                <td>{{$pay_str->medical_leave_entitlement }}</td>
                <td>{{$pay_str->medical_allowance }}</td>
            

                <td>
                    <a href="editPayStructure/{{$pay_str->id}}" title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                   
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