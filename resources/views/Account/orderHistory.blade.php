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
<li class="active">Order History</li>
</ul>
</div>
</div>
</div>


<section class="dashboard-area ptb-54">
<div class="container">
<div class="row">
<div class="col-lg-4">
<ul class="dashboard-navigation">
<li>
<h3>Dashboard</h3>
</li>
<li>
<a href="{{ route('editProfile') }}" class="active">Edit Profile</a>
</li>

<li>
<a href="{{ route('editAddress') }}">Edit Address</a>
</li>
<li>
<a href="{{ route('orderHistory') }}">Order History</a>
</li>
<li>
<a href="#">Log Out</a>
</li>
</ul>
</div>
<div class="col-lg-8">
<div class="cart-area recent-order">
<h3>Order History</h3>
<form class="cart-controller mb-0">
<div class="cart-table table-responsive">
<table class="table table-bordered">
<thead>
<tr>
<th scope="col">Product</th>
<th scope="col"></th>
<th scope="col">Order</th>
<th scope="col">Quantity</th>
<th scope="col">Status</th>
<th scope="col">Total</th>
<th scope="col">Trash</th>
</tr>
</thead>
<tbody>
<tr>
<td class="product-thumbnail">
<a href="product-details.html">
<img src="assets/images/products/product-1.jpg" alt="Image">
</a>
</td>
<td class="product-name">
<a href="product-details.html">DFMALB 20V Max XX Oscillating Multi <br> Tool Variable Speed Tool</a>
</td>
<td class="product-price">
<span class="unit-amount">#001</span>
</td>
<td class="product-price">
<span class="unit-amount">01</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">Paid</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">$90.00</span>
</td>
<td class="trash">
<a href="order-history.html" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
<tr>
<td class="product-thumbnail">
<a href="product-details.html">
<img src="assets/images/products/product-2.jpg" alt="Image">
</a>
</td>
<td class="product-name">
<a href="product-details.html">Power Tools Set Chinese Manufacturer <br> Production 50V Lithu Battery</a>
</td>
<td class="product-price">
<span class="unit-amount">#005</span>
</td>
<td class="product-price">
<span class="unit-amount">02</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">Pending</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">$50.00</span>
</td>
<td class="trash">
<a href="order-history.html" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
<tr>
<td class="product-thumbnail">
<a href="product-details.html">
<img src="assets/images/products/product-3.jpg" alt="Image">
</a>
</td>
<td class="product-name">
<a href="product-details.html">Electrical Magnetic Impact Power <br> Hammer Drills Machine </a>
</td>
<td class="product-price">
<span class="unit-amount">#009</span>
</td>
<td class="product-price">
<span class="unit-amount">02</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">Failed</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">$30.00</span>
</td>
<td class="trash">
<a href="order-history.html" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
<tr>
<td class="product-thumbnail">
<a href="product-details.html">
<img src="assets/images/products/product-4.jpg" alt="Image">
</a>
</td>
<td class="product-name">
<a href="product-details.html">Professional Cordless Drill Power Tools <br> Set Competitive Price</a>
</td>
<td class="product-price">
<span class="unit-amount">#0062</span>
</td>
<td class="product-price">
<span class="unit-amount">02</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">Paid</span>
</td>
<td class="product-subtotal">
<span class="subtotal-amount">$45.00</span>
</td>
<td class="trash">
<a href="order-history.html" class="remove">
<i class="ri-close-fill"></i>
</a>
</td>
</tr>
</tbody>
</table>
</div>
</form>
</div>
</div>
</div>
</div>
</section>


<div class="go-top">
<i class="ri-arrow-up-s-fill"></i>
<i class="ri-arrow-up-s-fill"></i>
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