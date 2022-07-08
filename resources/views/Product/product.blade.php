
@extends('frontend.user.layouts.master')
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
<li class="active">Shop</li>
</ul>
</div>
</div>
</div>


<section class="products-area ptb-54">

<div class="container-fluid">
<div class="row">
<div class="col-lg-3">
<div class="widget-sidebar mr-15">
<div class="sidebar-widget categories">
<ul>
<li>
<h3>Product Categories</h3>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Power Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Hand Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Cordless Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Welding & Soldering
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Gardening Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Safety Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Site Lighting Tools
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Tools Accessories
</a>
</li>
<li>
<a href="#">
<i class="ri-arrow-right-s-line"></i>
Outdoor Power Equipment
</a>
</li>
</ul>
</div>
<div class="sidebar-widget filter">
<h3>Filter By Price</h3>
<form class="price-range-content">
<div class="price-range-bar" id="range-slider"></div>
<div class="price-range-filter">
<div class="price-range-filter-item">
<input type="text" id="price-amount" readonly>
</div>
</div>
</form>
</div>
<div class="sidebar-widget brand">
<ul>
<li>
<h3>Brand</h3>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Depen
<span>(21)</span>
</div>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Esit
<span>(10)</span>
</div>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Mund
<span>(15)</span>
</div>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Roose
<span>(05)</span>
</div>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Scora
<span>(13)</span>
</div>
</li>
<li>
<div class="form-group checkboxs">
<input type="checkbox" class="chb2">
Wikin
<span>(17)</span>
</div>
</li>
</ul>
</div>

</div>
</div>

<div class="col-lg-9">
    <div class="row justify-content-center">
    @foreach ($product as $products )
        <div class="col-xl-3 col-sm-6">
        <div class="single-products">
        <div class="product-img">
        <a href="{{ route('productShow',$products->id) }}">
        <img src="{{ asset($products->product_image) }}" alt="Image">                            
        </a>
        <span class="hot new">New</span>
        </div>
        <div class="product-content">
        <a href="{{ route('productShow',$products->id) }}" class="title">
        {{($products->product_name) }}
        </a>
        <ul class="products-rating">
        <li>
        <i class="ri-star-fill"></i>
        </li>
        <li>
        <i class="ri-star-fill"></i>
        </li>
        <li>
        <i class="ri-star-fill"></i>
        </li>
        <li>
        <i class="ri-star-fill"></i>
        </li>
        <li>
        <i class="ri-star-fill"></i>
        </li>
        <li>
        <a href="product-details.html">
        (03 Review)
        </a>
        </li>
        </ul>
        <ul class="products-price">
        <li>
        ${{($products->price) }}
        <del>${{($products->price) }}</del>
        </li>
        <li>
        <span>In Stock</span>
        </li>
        </ul>
        <ul class="products-cart-wish-view">
        <li>
        <a href="shopping-cart.html" class="default-btn">
        <i class="ri-shopping-cart-line"></i>
        Add To Cart
        </a>
        </li>
        <li>
        <a href="wishlist.html" class="wish-btn">
        <i class="ri-heart-line"></i>
        </a>
        </li>
        <li>
        <a href="{{ route('productShow',$products->id) }}" class="eye-btn">
        <i class="ri-eye-line"></i>
        </a>
        </li>
        </ul>
         </div>
        </div>
        </div>
        @endforeach
        <div class="col-12">
        <div class="pagination-area text-center">
        <span class="page-numbers current" aria-current="page">1</span>
        <a href="featured-products.html" class="page-numbers">2</a>
        <a href="featured-products.html" class="page-numbers">3</a>
        <a href="featured-products.html" class="next page-numbers">
        <i class="ri-arrow-right-line"></i>
        </a>
        </div>
        </div>      
        </div>
             
</div>
</div>
</div>
</section>

    
    <div class="modal fade product-view-one" id="exampleModal">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
    <button type="button" class="close" data-bs-dismiss="modal">
    <span aria-hidden="true">
    <i class="ri-close-line"></i>
    </span>
    </button>
    <div class="row">
        <div class="col-lg-6 col-sm-6">
        <div class="form-group has-error">
        <label>Name</label>
        <input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name">
        <div class="help-block with-errors"><ul class="list-unstyled"><li>Please enter your name</li></ul></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone_number" id="phone_number" required="" data-error="Please enter your number" class="form-control">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-6 col-sm-6">
        <div class="form-group">
        <label>Subject</label>
        <input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject">
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-12">
        <div class="form-group">
        <label>Message</label>
        <textarea name="message" class="form-control" id="message" cols="30" rows="6" required="" data-error="Write your message"></textarea>
        <div class="help-block with-errors"></div>
        </div>
        </div>
        <div class="col-lg-12 col-md-12">
        <div class="form-group checkboxs">
        <input type="checkbox" class="chb2">
        <p>
        Accept <a href="#">Terms &amp; Conditions</a> And <a href="#">Privacy Policy.</a>
        </p>
        </div>
        </div>
        <div class="col-lg-12 col-md-12">
        <button type="submit" class="default-btn disabled" style="pointer-events: all; cursor: pointer;">
        <span>Send Message</span>
        </button>
        <div id="msgSubmit" class="h3 text-center hidden"></div>
        <div class="clearfix"></div>
        </div>
        </div>
    </div>
    </div>
    </div>
    
    
    <div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
    </div>
    
    
  
    <script src="assets/js/jquery.min.js"></script>
    
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

    
    @endsection