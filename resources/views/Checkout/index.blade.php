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
<li class="active">Checkout</li>
</ul>
</div>
</div>
</div>


<section class="checkout-area ptb-54">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-12">
<form action="{{ route('check.fetch') }}" method="POST" class="checkout-form">
@csrf
<div class="billing-details">
<h3 class="title">Billing Details</h3>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>First Name <span class="required">*</span></label>
<input type="text" class="form-control" name="full_name" value="{{ Auth::user()->user_name }}">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Email <span class="required">*</span></label>
<input type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Mobile <span class="required">*</span></label>
<input type="text" class="form-control" name="phone" value="{{ Auth::user()->phone }}">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Country <span class="required">*</span></label>
<div class="select-box">
<select name="country" id="countryId" class="form-control" >
                                         <option value="" >Singapore</option> 
                                            @foreach (App\Models\Country::all() as $Country)
                                                <option value="">{{$Country->name}}</option>
                                                @endforeach
                                        
</select>
</div>
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-group">
<label>Street Address <span class="required">*</span></label>
<input type="text" class="form-control" name="address" value="{{ @$Billing_address->address }}">
</div>
</div>
<div class="col-lg-12 col-md-6">
<div class="form-group">
<label>Town / City <span class="required">*</span></label>
<input type="text" class="form-control" name="city" value="{{ @$Billing_address->city }}">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>State<span class="required">*</span></label>
<input type="text" class="form-control" name="state" value="{{ @$Billing_address->state }}">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>Zip Code<span class="required">*</span></label>
<input type="text" class="form-control" name="zip" value="{{ @$Billing_address->zip }}">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-check">
<input type="checkbox" class="form-check-input" id="ship-different-address">
<label class="form-check-label" for="ship-different-address">Ship to above address</label>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>Order Notes (Optional)</label>
<textarea name="notes" id="notes" cols="30" rows="8" class="form-control"></textarea>
</div>
</div>
</div>
</div>

</div>
<div class="col-lg-4 col-md-12">
<div class="order-details ml-15">
<div class="cart-totals mb-0">
<h3>Cart Totals</h3>
<ul>
<li>Subtotal <span>$240.00</span></li>
<li>Shipping <span>$240.00</span></li>
<li>Coupon <span>$00.00</span></li>
<li>Total <span>$240.00</span></li>
<li><b>Payable Total</b> <span><b>$240.00</b></span></li>
</ul>
<div class="faq-accordion">
<h3>Payment method</h3>
<ul class="accordion">
<li class="accordion-item active">
<a class="accordion-title" href="javascript:void(0)">
Direct bank transfer
</a>
<p class="accordion-content show">
Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have our account.
</p>
</li>
<li class="accordion-item">
<a class="accordion-title" href="javascript:void(0)">
Cash on delivery
</a>
<p class="accordion-content">
Please send your cheque to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
</p>
</li>
<li class="accordion-item">
<a class="accordion-title" href="javascript:void(0)">
PayPal
</a>
<p class="accordion-content">
Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
</p>
</li>
<li class="accordion-item">
<div class="form-check">
<input type="checkbox" class="form-check-input" id="ship-differents-address">
<label class="form-check-label" for="ship-different-address">I’ve read and accept the <a href="terms-conditions.html">terms & conditions</a>*</label>
</div>
</li>
<li class="place-order">
<button type="submit" class="default-btn two">
Place order
</button>
</li>
</ul>
</div>
</div>
</div>
</form>
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