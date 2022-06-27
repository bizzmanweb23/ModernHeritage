@extends('frontend.admin.layouts.master')
@section('content')


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<h5>Employee Leave</h5>

<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addLeave') }}" class="btn btn-primary">Claim Leave</a>
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
                <th>Period</th>
               
                <th>No of Days </th>
                <th>Status</th>
                <th>Action </th>
            </tr>
        </thead>
        <tbody>
        @foreach($employee as $key=>$ld)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ld->unique_id}}</td>
                <td>{{$ld->emp_name}}</td>

                <td><?php echo date("d/m/Y", strtotime($ld->start_date)) ?> - <?php echo date("d/m/Y", strtotime($ld->end_date)) ?></td>
            
                @if($ld->no_of_day > 1)
                <td>{{$ld->no_of_day}} Days</td>
                @else
                <td>{{$ld->no_of_day}} Day</td>
                @endif
                @if($ld->status == 1)
                <td><span class="badge badge-success">Approved</span></td>
                @else
                <td><span class="badge badge-danger">Not Approved</span></td>
                @endif
                <td>

                    <a href="editLeave/{{$ld->id}}" title="edit"><span class="badge badge-warning"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_product(this.id)" id="{{$ld->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
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