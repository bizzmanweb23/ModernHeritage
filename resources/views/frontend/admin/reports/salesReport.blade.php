@extends('frontend.admin.employee.index')

@section('content')


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>




@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:15px;">

    <form method="POST" action="{{ route('exportSalesReport') }}">
        @csrf

        <div class="form-group">
            <div class="row">

                <div class="col-md-4">
                    <select name="month" class="form-control" id="month" required>
                        <option value="">All</option>
                        <option value="1" @if(isset($_GET['month']) && $_GET['month']==1 )selected @endif>January</option>
                        <option value="2" @if(isset($_GET['month']) && $_GET['month']==2 )selected @endif>February</option>
                        <option value="3" @if(isset($_GET['month']) && $_GET['month']==3 )selected @endif>March</option>
                        <option value="4" @if(isset($_GET['month']) && $_GET['month']==4 )selected @endif>April</option>
                        <option value="5" @if(isset($_GET['month']) && $_GET['month']==5 )selected @endif>May</option>
                        <option value="6" @if(isset($_GET['month']) && $_GET['month']==6 )selected @endif>June</option>
                        <option value="7" @if(isset($_GET['month']) && $_GET['month']==7 )selected @endif>July</option>
                        <option value="8" @if(isset($_GET['month']) && $_GET['month']==8 )selected @endif>August</option>
                        <option value="9" @if(isset($_GET['month']) && $_GET['month']==9 )selected @endif>September</option>
                        <option value="10" @if(isset($_GET['month']) && $_GET['month']==10 )selected @endif>October</option>
                        <option value="11" @if(isset($_GET['month']) && $_GET['month']==11 )selected @endif>November</option>
                        <option value="12" @if(isset($_GET['month']) && $_GET['month']==12 )selected @endif>December</option>
                    </select>
                </div>
                <div class="col-md-3">


                    <button type="submit" class="btn btn-primary">Download</button>


                </div>

            </div>


        </div>
    </form>

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Date</th>
                <th>Customer Details</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            @foreach($sales as $key=>$ex)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{date("d/m/Y", strtotime($ex->created_at))}}</td>

                <td>{{$ex->customer_name}}<br>
                    {{$ex->customer_email}}<br>
                    {{$ex->customer_phone}}
                </td>

                <td>{{$ex->order_mode}}</td>

                <td>{{$ex->order_amount}}</td>
                <td><a href="order-details/{{$ex->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a></td>

            </tr>


            @endforeach

        </tbody>

    </table><br>

</div>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });

    function delete_expense(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteExpense')}}",
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
    $('#month').change(function(e) {
        e.preventDefault();
        var month = $('#month').val();

        $.ajax({
            url: "{{route('allSalesReports')}}",
            type: 'GET',
            data: {
                month: month
            },
            success: function(data) {
                location.replace('?month=' + month);

            }
        });


    });
</script>















@endsection