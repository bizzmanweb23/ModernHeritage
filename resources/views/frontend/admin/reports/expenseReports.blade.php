@extends('frontend.admin.employee.index')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<div class="container card" style="padding:15px;">

    <form method="POST" action="{{ route('exportExpensesReport') }}">
        @csrf
        <div class="form-group">

            <div class="row">
                <div class="col-md-4">
                    <select name="year" class="form-control" id="year" required>
                        <option value="">Any Year</option>
                        <option value="2020" @if(isset($_GET['year']) && $_GET['year']==2020 )selected @endif>2020</option>
                        <option value="2021" @if(isset($_GET['year']) && $_GET['year']==2021 )selected @endif>2021</option>
                        <option value="2022" @if(isset($_GET['year']) && $_GET['year']==2022)selected @endif>2022</option>
                        <option value="2023" @if(isset($_GET['year']) && $_GET['year']==2023 )selected @endif>2023</option>
                        <option value="2024" @if(isset($_GET['year']) && $_GET['year']==2024 )selected @endif>2024</option>
                        <option value="2025" @if(isset($_GET['year']) && $_GET['year']==2025 )selected @endif>2025</option>
                        <option value="2026" @if(isset($_GET['year']) && $_GET['year']==2026 )selected @endif>2026</option>
                        <option value="2027" @if(isset($_GET['year']) && $_GET['year']==2027 )selected @endif>2027</option>
                        <option value="2028" @if(isset($_GET['year']) && $_GET['year']==2028 )selected @endif>2028</option>
                        <option value="2029" @if(isset($_GET['year']) && $_GET['year']==2029 )selected @endif>2029</option>
                        <option value="2030" @if(isset($_GET['year']) && $_GET['year']==2030 )selected @endif>2030</option>
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
                <th>Details</th>
                <th>Payment Mode</th>
                <th>Amount</th>

            </tr>
        </thead>

        <tbody>
            @php
            $total = 0;
            @endphp
            @foreach($expense as $key=>$ex)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{date("d/m/Y", strtotime($ex->date))}}</td>

                <td>{{$ex->details}}</td>
                @if($ex->payment_mode == 1)
                <td>CASH</td>
                @else
                <td>ONLINE</td>
                @endif
                <td>{{$ex->expense_amount}}</td>

            </tr>
            @php
            $total = $total+$ex->expense_amount;
            @endphp

            @endforeach

        </tbody>

    </table><br>
    <div style="background-color:green;color:white;padding:5px;">Total Expense : {{$total}}</div>
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
    $('#year').change(function(e) {
        e.preventDefault();
        var year = $('#year').val();

        $.ajax({
            url: "{{route('allExpenses')}}",
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