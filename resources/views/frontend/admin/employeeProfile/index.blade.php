@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h5>Employee Attendance</h5>

<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addAttendance') }}" class="btn btn-primary">Give Attendance</a>
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
                <th>Login Date / Time</th>
                <th>Logout Date / Time </th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ld->unique_id}}</td>
                <td>{{$ld->emp_name}}</td>

                <td>{{$ld->login_date}}</td>
                <td>{{$ld->logout_date}}</td>
                <td>
                    <a href="editLoginTime/{{$ld->id}}" title="give logout time"><span class="badge badge-warning"><i class="fa fa-sign-out" aria-hidden="true"></i></span></a>
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

    $('#year').change(function(e) {
        e.preventDefault();
        var year = $('#year').val();

        $.ajax({
            url: "{{route('holidayList')}}",
            type: 'GET',
            data: {
                year: year
            },
            success: function(data) {
                location.replace('?year=' + year);

            }
        });


    });
</script>









@endsection