@extends('frontend.admin.employee.index')

@section('content')

<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="col-md-4">
    <a href="{{route('addArticles')}}" class="btn btn-primary">Add KB Articles</a>
</div>



@if(Session::has('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong> {{ Session::get('message') }}</strong>

</div>
@endif
<div class="container card" style="padding:15px;">

   

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

        <tbody>
           
           
            
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