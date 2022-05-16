@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>


<div class="card" style="padding:15px;">
    <h5>Order Management</h5>




    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
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
                    @if($c->delivery_status == 1)
                    <a href="assign_to_driver/{{$c->id}}" title="assign to driver"><span class="badge badge-info"><i class="fa fa-car"></i></span></a>
                    @else
                    <a href="assign_to_delivery/{{$c->id}}" title="assign to delivery"><span class="badge badge-primary"><i class="fa fa-truck"></i></span></a>
                    @endif
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
  
</script>
@endsection