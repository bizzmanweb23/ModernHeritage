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
<li class="active">Contact</li>
</ul>
</div>
</div>
</div>


<section class="contact-area ptb-54">
<div class="container">
<div class="row">
<div class="col-lg-3">
<div class="contact-info-europe">
<h3>Contact Details</h3>
<ul>
<li class="p-0">
<h4>Europe Office</h4>
</li>
<li>
<i class="ri-map-pin-line"></i>
2491 Reel Avenue Albuquerque, NM
</li>
<li>
<i class="ri-phone-line"></i>
<a href="tel:+1-(514)-321-4566">+1 (514) 321-4566</a>
<a href="tel:+1-(514)-321-4567">+1 (514) 321-4567</a>
</li>
<li>
<i class="ri-mail-send-line"></i>
<a href="#"><span class="__cf_email__" data-cfemail="87e2efe6fec7e2ffe6eaf7ebe2a9e4e8ea">[email&#160;protected]</span></a>
</li>
<li>
<i class="ri-time-line"></i>
Mon-Sat 8:00 AM - 8:00 PM
</li>
</ul>
<ul>
<li class="p-0">
<h4>Asia Office</h4>
</li>
<li>
<i class="ri-map-pin-line"></i>
2491 Reel Avenue Albuquerque, NM
</li>
<li>
<i class="ri-phone-line"></i>
<a href="tel:+1-(514)-321-4566">+1 (514) 321-4566</a>
<a href="tel:+1-(514)-321-4567">+1 (514) 321-4567</a>
</li>
<li>
<i class="ri-mail-send-line"></i>
<a href="#"><span class="__cf_email__" data-cfemail="46232e273f06233e272b362a236825292b">[email&#160;protected]</span></a>
</li>
<li>
<i class="ri-time-line"></i>
Mon-Sat 8:00 AM - 8:00 PM
</li>
</ul>
</div>
</div>
<div class="col-lg-9">
    <div class="container">
        <div class="contact-form">
        <h2>Leave A Message</h2>
        <form id="contactForm">
        <div class="row">
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone_number" id="phone_number" required data-error="Please enter your number" class="form-control">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Subject</label>
        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required data-error="Write your message"></textarea>
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-12 col-md-12">
        <div class="form-group checkboxs">
        <input type="checkbox" class="chb2">
        <p>
        Accept <a href="terms-conditions.html">Terms &amp; Conditions</a> And <a href="privacy-policy.html">Privacy Policy.</a>
        </p>
        </div>
        </div>
        <div class="col-lg-12 col-md-12">
        <button type="submit" class="default-btn">
        <span>Send Message</span>
        </button>
        <div id="msgSubmit" class="h3 text-center hidden"></div>
        <div class="clearfix"></div>
        </div>
        </div>
        </form>
        </div>
        </div>
</div>
</div>
</div>
</section>


<section class="contact-area pb-54">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3678.284705408741!2d88.32848331479627!3d22.791912085070397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89aae4f6a36af%3A0x9e0fbb61a52122b0!2sBaidyabati%20Rail%20Gate%20Bus%20Stop!5e0!3m2!1sen!2sin!4v1657256585351!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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