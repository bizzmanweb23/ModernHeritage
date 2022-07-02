@extends('frontend.admin.employee.index')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="col-md-4">
    <a href="{{route('addExpenses')}}" class="btn btn-primary">Add Daily Expenses</a>
</div>



@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-4">
                    <select name="month" class="form-control" id="month">
                        <option value="all">All</option>
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


            </div>
        </div>
    </form>

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Date</th>
                <th>Details</th>
                <th>Payment Mode</th>
                <th>Amount</th>
                <th>Action</th>
            </tr>
        </thead>
        @foreach($expense as $key=>$ex)
        <tbody>


            <td>{{$key+1}}</td>
            <td>{{$ex->date}}</td>

            <td>{{$ex->details}}</td>
            @if($ex->payment_mode == 1)
            <td>CASH</td>
            @else
            <td>ONLINE</td>
            @endif
            <td>{{$ex->expense_amount}}</td>
            <td>


                <a href="javascript:void(0)" onclick="return delete_expense(this.id)" id="{{$ex->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash"></i></span></a>

            </td>


        </tbody>
        @endforeach
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
            url: "{{route('allExpenses')}}",
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