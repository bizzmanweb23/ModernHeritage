
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
<li class="active">Dashboard</li>
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
<div class="profile-bar">
<div class="row align-items-center">
<div class="col-lg-6 col-md-6">
<div class="profile-info">
<img src="{{ Auth::user()->user_image }}" alt="Image">
<h3>
<a href="edit-profile.html">{{ Auth::user()->user_name }}</a>
</h3>
<a href="#">{{ Auth::user()->email }}</a>
<a href="tel:+1-(514)-321-4566">{{ Auth::user()->phone }}</a>
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="edit-profiles">
</div>
</div>
</div>
</div>

</tbody>

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