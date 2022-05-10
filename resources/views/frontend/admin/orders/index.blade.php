@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="card" style="padding:15px;">
    <h5>Order Management</h5>




    <table class="table-responsive table-hover" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Order Id</th>
                <th>Customer Name</th>
                <th>Order Status</th>
                <th>Order Total</th>
                <th>Payment Method</th>
                <th>Order Date</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
            @foreach($orders as $key=>$c )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                <td>
                    {{$c->order_id}}
                </td>
                <td>{{$c->customer_name}}</td>
                <td>
                   
                        {{ $c->order_status }}
                   
                </td>
                <td>{{ $c->order_amount }}</td>
                <td>{{$c->order_mode}}</td>
                <td>{{$c->created_at->format('d/m/Y')}}</td>

                <td>
                   
                    <a href="order-details/{{$c->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>

                </td>


            </tr>
            @endforeach


        </tbody>
    </table>

</div>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable();
    });
  
</script>
@endsection