@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Order Management</h5>
<div class="row">



</div>
<div class="card" style="padding:15px;">

    <form>

        <div class="col-md-12">
            <div class="form-group">

                <div class="row">
                    <!-- <div class="col-md-4">
                    <select name="order_status" class="form-control" id="order_status">
                        <option value="all">All</option>
                        @foreach($order_status as $key=>$st)
                        <option value="{{$st->id}}" @if(isset($_GET['order_status']) && $_GET['order_status'] == $st->id )selected @endif>{{$st->order_status}}</option>
                        @endforeach
                    </select>
                </div> -->
                    <div class="col-md-4">
                        <select name="order_type" class="form-control" id="order_type">

                            <option value="customer_order">Customer Orders</option>
                            <option value="lorry_crane_order">Lorry Crane Orders</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                    </div>
                    <div class="col-md-3" style="padding-left:45px;">
                        <a href="{{ route('createOrder') }}" class="btn btn-primary">Lorry Crane Order Form</a>
                    </div>

                </div>
            </div>

        </div>
    </form>
    <div id="fleet_orders">

        <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableIdf">
            <thead>
                <tr>
                    <th>Sl#</th>
                    <th>Customer Id</th>
                    <th>Order Date & Time</th>
                    <th>Order Status</th>
                    <th>Action</th>



                </tr>
            </thead>
            <tbody>
                @foreach($fleet_order as $key=>$c )
                <tr>
                    <td style="text-align:center">{{$key+1}}</td>
                    <td>
                        {{$c->customer_id}}
                    </td>
                    <td>{{$c->order_date}}-{{$c->order_time}}</td>
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


                    <td>
                        <a href="order-edit/{{$c->id}}" title="edit"><span class="badge badge-info"><i class="fa fa-edit" aria-hidden="true"></i></span></a>
                        <a href="order-view/{{$c->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>


                    </td>


                </tr>
                @endforeach


            </tbody>

        </table>
    </div>
    <div id="orders">

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
                        @if($c->ordStatus == 'Completed')
                        <span class="badge badge-success">Completed</span>
                        @endif
                        @if($c->ordStatus == 'Pending')
                        <span class="badge badge-warning">Pending</span>
                        @endif
                        @if($c->ordStatus == 'Canceled')
                        <span class="badge badge-danger">Canceled</span>
                        @endif
                        @if($c->ordStatus == 'Assign to Driver')
                        <span class="badge badge-info">Assign to Driver</span>
                        @endif
                        @if($c->ordStatus == 'Assign to Delivery')
                        <span class="badge badge-primary">Assign to Delivery</span>
                        @endif
                    </td>
                    <td>{{ $c->order_amount }}</td>
                    <td>{{$c->order_mode}}</td>
                    <td>{{$c->created_at->format('d/m/Y')}}</td>

                    <td>

                        <a href="order-details/{{$c->id}}" title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                        <a href="assign_driver/{{$c->id}}" title="assign to driver"><span class="badge badge-info"><i class="fa fa-car"></i></span></a>
                        <!-- @if($c->order_status == 1)
                    <a href="assign_to_delivery/{{$c->id}}" title="assign to delivery"><span class="badge badge-primary"><i class="fa fa-truck"></i></span></a>
                    @endif
                    @if($c->order_status == 4)
                    <a href="assign_to_driver/{{$c->id}}" title="assign to driver"><span class="badge badge-info"><i class="fa fa-car"></i></span></a>
                    @endif -->
                    </td>


                </tr>
                @endforeach


            </tbody>
        </table>
    </div>

</div>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $('#fleet_orders').hide();
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    $(function() {
        $('#tableIdf').DataTable({
            responsive: true
        });
    });
    $('#order_status').change(function(e) {
        e.preventDefault();
        var order_status = $('#order_status').val();

        $.ajax({
            url: "{{route('orderList')}}",
            type: 'GET',
            data: {
                order_status: order_status
            },
            success: function(data) {
                location.replace('?order_status=' + order_status);

            }
        });


    });
    $('#order_type').change(function(e) {
        e.preventDefault();
        var order_type = $('#order_type').val();
        if (order_type == 'lorry_crane_order') {
            $('#orders').hide();
            $('#fleet_orders').show();
        } else {
            $('#fleet_orders').hide();
            $('#orders').show();
        }




    });
</script>
@endsection