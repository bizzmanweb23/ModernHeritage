@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h5>Employee Attendance List</h5>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">

    <form method="POST" action="{{ route('exportAttendanceSheet') }}">
        @csrf
        <div class="row">
            <div class="col-md-3">
                <select name="deg_id" class="form-control" id="deg_id" required onChange="select_employee(this.value)">
                    <option value="">Select Designation</option>
                    @foreach($job_positions as $key=>$jb_p )
                    <option value="{{$jb_p->id}}">{{$jb_p->position_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="emp_id" class="form-control" id="emp_id" required>
                   
                </select>
            </div>
            <div class="col-md-3">
                <select name="month" class="form-control" id="month" required>
                    <option value="">Select Month</option>

                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="col-md-3">


                <button type="submit" class="btn btn-primary">Download</button>


            </div>


        </div>
        <br>
    </form>



    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Login Date / Time</th>
                <th>Logout Date / Time </th>

            </tr>
        </thead>
        <tbody>
            @foreach($data as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ld->unique_id}}</td>
                <td>{{$ld->emp_name}}</td>

                <td>{{$ld->login_date}}</td>
                <td>{{$ld->logout_date}}</td>

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
<script type="text/javascript">
    $(document).ready(function() {
        $('#deg_id').on('change', function(e) {
            var deg_id = e.target.value;
            $.ajax({
                url: "{{ route('getEmployee') }}",
                type: "GET",
                data: {
                    deg_id: deg_id
                },
                success: function(data) {


                    if (data) {
                        $('#emp_id').empty();
                        $('#emp_id').append('<option hidden>Choose Employee</option>');
                        $.each(data, function(key, emp) {
                            $('select[name="emp_id"]').append('<option value="' + emp.id + '">' + emp.emp_name + '</option>');
                        });
                    } else {
                        $('#emp_id').empty();
                    }
                }
            })
        });
    });
</script>
@endsection