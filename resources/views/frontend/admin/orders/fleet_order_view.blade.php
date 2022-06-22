@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateOrder') }}" method="POST">
    @csrf

    <div class="container mb-4">
        <h5>Fleet Order Form</h5>
        <div class="card p-1">
            <h4 class="pl-4 mb-0 pt-3"></h4>
            <div class="card-body">
                <div class="ms-auto text-end">


                    <a href="{{route('orderList')}}" class="btn btn-link"><i class="fa fa-arrow-left"></i>Back</a>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>

                            <label>Customer ID :</label>
                            {{$fleet_order->customer_id}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="order_date">Date :</label>
                            {{$fleet_order->order_date}}
                        </span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <span>
                            <label for="order_time">Time:</label>
                            {{$fleet_order->order_time}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="pickup_address">Pickup Address:</label>
                            {{$fleet_order->pickup_address}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="delivery_address">Delivery Address:</label>
                            {{$fleet_order->delivery_address}}
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="type">Type of renal :</label>   
                            @if($fleet_order->type == 1)
                            Trip (Basis 3Hrs)
                            @elseif($fleet_order->type == 2)
                            Daily (8hrs)
                            @elseif($fleet_order->type == 3)
                            Weekly (Mon to Sat)
                            @else($fleet_order->type == 4)
                            Other
                            @endif
                          
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="vehicle_id">Lorry Crane (Ton) :</label>
                            @if($fleet_order->vehicle_id == 1)
                            10Ton Lorry Crane (18Ton Load Capacity)
                            @elseif($fleet_order->vehicle_id == 2)
                            15Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 3)
                            20Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 4)
                            25Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 5)
                            35Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 6)
                            55Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 7)
                            75Ton Lorry Crane
                            @elseif($fleet_order->vehicle_id == 8)
                            3Ton Lorry Crane (14ft)
                            @endif
                        </span>
                    </div>
                    <div class="col-md-6">
                        <span>
                            <label for="po_number">PO / SO Number (If applicable) :</label>
                            {{$fleet_order->po_number}}
                        </span>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Remarks :</label>
                        {{$fleet_order->remarks}}
                    </div>


                </div>
            </div>
        </div>



    </div>


</form>



@endsection