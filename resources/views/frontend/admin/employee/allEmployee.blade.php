
@extends('frontend.admin.layouts.master')
@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Employee Management</h5>
<div class="row">
    <div class="col-md-4">
    <a href="{{ route('addEmployee') }}" class="btn btn-primary">Add Employee</a>
    </div>


</div>
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-6">
                    <select name="job_position_id" class="form-control" id="job_position_id">
                        <option value="all">Search By Job Positions</option>
                        @foreach($jobPositions as $j_pos)
                        <option value="{{$j_pos->id}}"  @if(isset($_GET['job_position_id']) && $_GET['job_position_id'] == $j_pos->id) selected @endif>{{$j_pos->position_name}}</option>
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

                <th>Employee Name</th>
                <th>Work Email</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach($employees as $key=>$emp )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td>{{$emp->emp_name }}</td>
                <td>{{$emp->work_email }}</td>
                @if($emp->expiry_date !='')
                @if(date_diff_day($emp->expiry_date)=='E')
                <td style="color:red;cursor:pointer;"  title="Driving License Expired"><b>{{date("d/m/Y", strtotime($emp->expiry_date))}}</b></td>
                @else
                <td><b>{{date("d/m/Y", strtotime($emp->expiry_date))}}</b></td>
                @endif
             @else
             <td>-</td>
                @endif
                @if($emp->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
              

                <td>
                    <a href="editEmployee/{{$emp->id}}" title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                    <a href="viewEmployee/{{$emp->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_job(this.id)" id="{{$emp->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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
    $('#job_position_id').change(function(e) {
        e.preventDefault();
        var job_position_id = $('#job_position_id').val();

        $.ajax({
            url: "{{route('allEmployee')}}",
            type: 'GET',
            data: {
                job_position_id : job_position_id
            },
            success: function(data) {
                location.replace('?job_position_id='+job_position_id);

            }
        });


    });

    function delete_job(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteJob')}}",
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