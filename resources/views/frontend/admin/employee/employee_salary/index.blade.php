@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Employee Salary</h5>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addSalary') }}" class="btn btn-primary">Add Employee Salary</a>
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
                 <th>Employee Name</th>

                <th>Designation</th>
              
                <th>Generate Payslip</th>
           
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            
        @foreach($emp_salary as $key=>$e_sl)
            <tr>
                <td style="text-align:center">{{$key+1}}</td>

                <td>{{$e_sl->emp_name }}</td>
                <td>{{$e_sl->position_name }}</td>
            
                <td> <a href="generatePayslip/{{$e_sl->id}}" title="edit"><button class="btn btn-info">Generate Payslip</button></a></td>
            

                <td>
                    <a href="editSalary/{{$e_sl->id}}" title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_salary(this.id)" id="{{$e_sl->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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

    function  delete_salary(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteEmployeeSalary')}}",
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