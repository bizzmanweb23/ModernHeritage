@extends('frontend.admin.layouts.master')

@section('content')


<div class="container card" style="padding:15px;">
    <h5>Order Details - {{$data->order_id}}</h5><br>
    <div class="row">
        <div class="col-md-3">

            <h6>Customer Info:</h6>
            {{$data->customer_name}}<br>
            {{$data->customer_email}}<br>
            {{$data->customer_phone}}

        </div>
        <div class="col-md-3">
            <h6>Delivery Info:</h6>
            {{$data->delivery_address}}<br>
            {{$data->delivery_state}}<br>
            {{$data->delivery_country}}
            {{$data->delivery_zipcode}}
        </div>
        <div class="col-md-3">
            <h6>Billing Info:</h6>
            {{$data->billing_address}}<br>
            {{$data->billing_state}}<br>
            {{$data->billing_country}}
            {{$data->billing_zipcode}}
        </div>
        <div class="col-md-3">
            <h6>Order Info:</h6>
            {{$data->order_status}}<br>

            {{$data->order_mode}}
        </div>
    </div>

</div>
<br>
<div class="container card" style="padding:15px;">

    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Qty</th>
                <th scope="col">Image</th>
                <th scope="col">Product Name</th>
                <th scope="col">Product Price</th>

            </tr>
        </thead>
        <tbody>


            @foreach($order_products as $pro)
            <tr>
                <td>{{$pro->product_quantity}}</td>
                <td>{{$pro->product_image}}</td>
                <td>{{$pro->product_name}}</td>
                <td>{{$pro->product_price}}</td>

            </tr>
            @endforeach
            <tr>
                <td colspan="3" style="text-align:right">Subtotal:</td>
                <td>{{$data->order_amount}}</td>
            </tr>



        </tbody>
    </table>






</div>
<br>
<div class="container card" style="padding:15px;">
    <div class="card-body">
        <form action="{{route('order_update')}}" method="post">
            @csrf
            <input type="hidden"  id="id" name="id" value="{{$data->id}}" />
            <div class="row mt-1">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Order Status</label>
                        <select class="form-control" id="order_status" name="order_status">
                            <option>--Select--</option>
                            @foreach($order_status as $row)
                            <option value="{{$row->id}}" @if($row->order_status == $data->order_status) selected @endif>{{$row->order_status}}</option>

                            @endforeach
                        </select>

                    </div>
                </div>

            </div>
            <div class="row mt-1">
                <div class="col-md-6">
                    <button class="btn btn-primary" id="save">Update</button>
                    <a class="btn btn-info" id="back" href="{{ route('orderList') }}">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection