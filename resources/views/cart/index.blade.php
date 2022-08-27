@extends('frontend.user.layouts.layout')
@section('content')


<div class="page-title-area">
<div class="container">
<div class="page-title-content">
<ul>
<li>
<a href="{{ url('/') }}">
Home
</a>
</li>
<li class="active">Shopping Cart</li>
</ul>
</div>
</div>
</div>

<style>
     .cart-table td.pro-quantity . {
  display: -webkit-inline-box;
  display: -ms-inline-flexbox;
  display: inline-flex;
  text-align: center;
  border: 1px solid #eeeeee;
}
.cart-table td.pro-quantity . .qtybtn {
  height: 42px;
  padding: 0 10px;
  border: none;
  background-color: transparent;
}
.cart-table td.pro-quantity . input {
  height: 42px;
  width: 50px;
  text-align: center;
  border-width: 0 1px;
  border-style: solid;
  border-color: #eeeeee;
  color: #929292;
}
    </style>

<section class="cart-area ptb-54">
<div class="container">
<div class="row">
<div class="col-lg-9">
<form class="cart-controller">
<div class="cart-table table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th>S.No</th>
<th scope="col">Product_Image</th>
<th scope="col">Product</th>
<th scope="col">Price</th>
<th scope="col" class="pro-quantity">Quantity</th>
<th scope="col">Total</th>
<th scope="col">Trash</th>
</tr>
</thead>
<tbody>
@php $total = 0 @endphp
@foreach($data as $key => $detail)
<?php 
                                        
         $price = $detail['price'];
        $total += $detail['price'] * $detail['quantity'] ;
                                       ?>

<tr>
<td class="s.no">
<a>{{ $key + 1 }}.</a>
</td>
<td class="product-thumbnail">
<a href="product-details.html">
<img src="{{ asset($detail['product_image']) }}" alt="Image">
</a>
</td>
<td class="product-name">
<a href="product-details.html">{{ $detail['product_name'] }} </a>
</td>
<td class="product-price">
<span class="pro-quantity">${{ $price }}</span>
</td>
<td class="product-quantity">
<div class="input-counter">
<span class="minus-btn">
<i class="ri-subtract-line"></i>
</span>
<input type="text" data-id="{{ $detail['id']}}" class="update-cart" value="{{ $detail['quantity'] }}" min="1">
<span class="plus-btn">
<i class="ri-add-line"></i>
</span>
</div>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">${{ $price * $detail['quantity'] }}</span>
</td>
<td class="trash">
<a href="{{ route('cart.remove',$detail['id']) }}" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</form>
<div class="coupon-cart">
<div class="row">
<div class="col-lg-8 col-md-8">
<div class="form-group mb-0">
</div>
</div>
<div class="col-lg-4 col-md-4">
</div>
</div>
</div>
</div>
<div class="col-lg-3">
<div class="cart-totals">
 <h3 class="cart-checkout-title">Cart Totals</h3>
<ul>
<li>Subtotal <span>$240.00</span></li>
<li>Shipping <span>$00.00</span></li>
<li>Total <span>$315.00</span></li>
<li><b>Payable Total</b> <span><b>$240.00</b></span></li>
</ul>
<a href="{{ route('checkout') }}" class="default-btn">
Proceed to checkout
</a>
</div>
</div>
</div>
</div>
</section>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/meanmenu.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/wow.min.js"></script>

<script src="assets/js/range-slider.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>

<script src="assets/js/ajaxchimp.min.js"></script>

<script src="assets/js/custom.js"></script>
</body>
</html>

@section('javascript')
    <script>
        $(".dec, .inc").click(function(){
            var quantity = $(this).parent().find('input').val();
            var cart_id = $(this).parent().find('input').attr('data-id');
            $.ajax({
            url:"{{ route('cart.update') }}",
            type: "POST",
            dataType: "json",
            data: {
                cart_id: cart_id,
                quantity: quantity,
                _token:"{{ csrf_token() }}",
            },
            success:function(data)
            {
                if(data.status == "Success"){
                    window.location.reload();
                }
            }
            })
        })
        $(document).ready(function(){
            var total = $("#sub_total").val();
            console.log(total);
        })
    </script>
@endsection
@endsection