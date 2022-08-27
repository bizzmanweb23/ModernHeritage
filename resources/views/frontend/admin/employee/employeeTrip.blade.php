@extends('frontend.admin.layouts.master')

@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Driver's Trip  Details</h5>

@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="card" style="padding:15px;">
    <form method="GET" action="{{ route('tripDetails') }}">
       
        <div class="row">
           
            <div class="col-md-3">
                <select name="emp_id" class="form-control" id="emp_id" required>
                <option value="">Select Driver</option>
                @foreach($employees as $key=>$emp )
                    <option value="{{$emp->unique_id}}"  @if(isset($_GET['emp_id']) && $_GET['emp_id'] == $emp->unique_id) selected @endif>{{$emp->emp_name}} </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <select name="month" class="form-control" id="month" required>
                    <option value="">Select Month</option>

                    <option value="1" @if(isset($_GET['month']) && $_GET['month'] == 1) selected @endif>January</option>
                    <option value="2" @if(isset($_GET['month']) && $_GET['month'] == 2) selected @endif >February</option>
                    <option value="3" @if(isset($_GET['month']) && $_GET['month'] == 3) selected @endif >March</option>
                    <option value="4" @if(isset($_GET['month']) && $_GET['month'] == 4) selected @endif>April</option>
                    <option value="5" @if(isset($_GET['month']) && $_GET['month'] == 5) selected @endif >May</option>
                    <option value="6" @if(isset($_GET['month']) && $_GET['month'] == 6) selected @endif>June</option>
                    <option value="7" @if(isset($_GET['month']) && $_GET['month'] == 7) selected @endif >July</option>
                    <option value="8" @if(isset($_GET['month']) && $_GET['month'] == 8) selected @endif >August</option>
                    <option value="9" @if(isset($_GET['month']) && $_GET['month'] == 9) selected @endif >September</option>
                    <option value="10"@if(isset($_GET['month']) && $_GET['month'] == 10)selected @endif >October</option>
                    <option value="11"@if(isset($_GET['month']) && $_GET['month'] == 11)selected @endif >November</option>
                    <option value="12"@if(isset($_GET['month']) && $_GET['month'] == 12)selected @endif >December</option>
                </select>
            </div>
            <div class="col-md-3">


                <button type="submit" class="btn btn-primary">Search</button>


            </div>


        </div>
        <br>
    </form>
    <div class="text-left">
    <span class="badge badge-success">Total Trip:
        {{$trip_count}}</span>
    </div><br>
    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>

                <th>Employee Name</th>
                <th>Email</th>
                <th>Action</th>




            </tr>
        </thead>
        <tbody>
            @foreach($employees_c as $key=>$emp )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td>{{$emp->emp_name }}</td>
                <td>{{$emp->work_email }}</td>
                <td><a href="order-details/{{$emp->order_id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a></td>
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