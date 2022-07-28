@extends('frontend.user.layouts.layout')
@section('content')


<div class="page-title-area">
<div class="container">
<div class="page-title-content">
<ul>
<li>
<a href="index.html">
Home
</a>
</li>
<li class="active">Edit Profile</li>
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
<h3>Navigation</h3>
</li>
<li>
<a href="dashboard.html">Dashboard</a>
</li>
<li>
<a href="edit-profile.html" class="active">Edit Profile</a>
</li>
<li>
<a href="edit-address.html">Edit Address</a>
</li>
<li>
<a href="order-history.html">Order History</a>
</li>
<li>
<a href="order-details.html">Order Details</a>
</li>
<li>
<a href="address.html">Address</a>
</li>
<li>
<a href="password.html">Password</a>
</li>
<li>
<a href="my-account.html">Log Out</a>
</li>
</ul>
</div>
<div class="col-lg-8">
<div class="edit-profile">
<h3>Edit Profile</h3>
<form class="submit-property-form">
<div class="row">
<div class="col-lg-6">
<div class="form-group">
<label>First Name</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>Last Name</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>Email Address</label>
<input type="email" class="form-control">
</div>
</div>
<div class="col-lg-6">
<div class="form-group">
<label>Phone Number</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-lg-12">
<div class="form-group">
<label>Gallery</label>
<div class="file-upload">
 <input type="file" name="file" id="file" class="inputfile">
<label class="upload" for="file">
<i class="ri-image-2-fill"></i>
Upload Photo
</label>
</div>
</div>
</div>
<div class="col-lg-12">
<button type="submit" class="default-btn">
Save Change
</button>
</div>
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