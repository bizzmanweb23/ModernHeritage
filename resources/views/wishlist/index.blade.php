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
<li class="active">Wishlist</li>
</ul>
</div>
</div>
</div>


<div class="cart-area ptb-54">
<div class="container">
<form class="cart-controller mb-0">
<div class="cart-table table-responsive">
<table class="table table-bordered">
<thead>
<tr>
    <th>S.No</th>
<th scope="col">Product_Image</th>
<th scope="col">Product</th>
<th scope="col">Price</th>
<th scope="col">Total</th>
<th scope="col"></th>
<th scope="col">Trash</th>
</tr>
</thead>
<tbody>
@foreach($data as $key => $detail)
<tr>
<td class="s.no">
<a>{{ $key + 1 }}.</a>
</td>
<td class="product-thumbnail">
<a href="product-details.html">
    <img src="{{ url('/' . $detail->product_image)}}" alt="">
</a>
</td>
<td class="product-name">
<a>{{ $detail->product_name }}</a>
</td>
<td class="product-price">
<span class="unit-amount">${{ $detail->price }}</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">${{ $detail->price }}</span>
</td>
<td>
<a href="{{ route('add.wish',$detail->id) }}" class="default-btn">
Shop Now
</a>
</td>
<td class="trash">
<a href="{{ route('wish.remove', $detail->id) }}" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</form>
</div>
</div>







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

@endsection