@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Order Collection</h5>
<div class="row">



</div>
<div class="card" style="padding:15px;">

   
 
  

        <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
            <thead>
                <tr>
                    <th>Sl#</th>
                   
                    <th>Customer Name</th>
                    <th>Order Status</th>
                    <th>Order Total</th>
                    <th>Payment Mode</th>
                    <th>Order Date</th>
                    <th>Action</th>



                </tr>
            </thead>
            <tbody>
            @foreach($collections as $key=>$c )
                <tr>
                    <td style="text-align:center">{{$key+1}}</td>
                   
                    <td>{{$c->customer_name}}</td>
                    <td>
                        @if($c->order_status == 2)
                        <span class="badge badge-success">Completed</span>
                        @endif
                        @if($c->order_status == 1)
                        <span class="badge badge-warning">Pending</span>
                        @endif
                        @if($c->order_status == 3)
                        <span class="badge badge-danger">Canceled</span>
                        @endif
                        @if($c->order_status == 4)
                        <span class="badge badge-info">Assign to Driver</span>
                        @endif
                        @if($c->order_status == 5)
                        <span class="badge badge-primary">Assign to Delivery</span>
                        @endif
                    </td>
                    <td>{{ $c->order_amount }}</td>
                    <td>{{$c->order_mode}}</td>
                    <td>{{$c->created_at}}</td>

                    <td>

                        <a href="order-details/{{$c->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                        <a href="assign_driver/{{$c->id}}" title="assign to driver"><span class="badge badge-info"><i class="fa fa-car"></i></span></a>
                     
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