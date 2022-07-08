@extends('frontend.user.layouts.main')
@section('content')


<div class="modal fade cart-shit" id="exampleModal-cart" tabindex="-1" aria-hidden="true">
<div class="cart-shit-wrap">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close-btn" data-bs-dismiss="modal">
<i class="ri-close-fill"></i>
</button>
</div>
<div class="modal-body">
<ul class="cart-list">
<li>
<img src="{{ url('/') }}/user/assets/images/products/product-1.jpg" alt="Image">
<a href="#">
DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool
</a>
<span>$125.00</span>
<i class="ri-close-fill"></i>
</li>
<li>
<img src="{{ url('/') }}/user/assets/images/products/product-2.jpg" alt="Image">
<a href="#">
Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
</a>
<span>$125.00</span>
<i class="ri-close-fill"></i>
</li>
<li>
<img src="{{ url('/') }}/user/assets/images/products/product-3.jpg" alt="Image">
<a href="#">
Electrical Magnetic Impact Power Hammer Drills Machine
</a>
<span>$125.00</span>
<i class="ri-close-fill"></i>
</li>
<li>
<img src="{{ url('/') }}/user/assets/images/products/product-4.jpg" alt="Image">
<a href="#">
Professional Cordless Drill Power Tools Set Competitive Price
</a>
<span>$125.00</span>
<i class="ri-close-fill"></i>
</li>
</ul>
<ul class="payable">
<li>
Payable total
</li>
<li class="total">
<span>$564.00</span>
</li>
</ul>
<ul class="cart-check-btn">
<li>
<a href="#" class="default-btn">
View Cart
</a>
</li>
<li class="checkout">
<a href="#" class="default-btn">
Checkout
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>


<div class="page-title-area">
<div class="container">
<div class="page-title-content">
<ul>
<li>
<a href="index.html">
Home
</a>
</li>
<li class="active">Product Details</li>
</ul>
</div>
</div>
</div>


<section class="product-details-area ptb-54">
<div class="container">
<div class="row align-items-center">
<div class="product-view-one">
<div class="modal-content p-0">
<div class="row align-items-center">
<div class="col-lg-6">
<div class="product-view-one-image">
<div id="big" class="owl-carousel owl-theme">
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<!-- <div class="item">
<img src="{{ url('/') }}/user/assets/images/products/product-11.jpg" alt="Image">
</div>
<div class="item">
<img src="{{ url('/') }}/user/assets/images/products/product-12.jpg" alt="Image">
</div>
<div class="item">
<img src="{{ url('/') }}/user/assets/images/products/product-13.jpg" alt="Image">
</div>
<div class="item">
<img src="{{ url('/') }}/user/assets/images/products/product-14.jpg" alt="Image">
</div>
<div class="item">
<img src="{{ url('/') }}/user/assets/images/products/product-15.jpg" alt="Image">
</div> -->
</div>
<div id="thumbs" class="owl-carousel owl-theme">
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
<div class="item">
<img src="{{ asset($products->product_image) }}" alt="Image">
</div>
</div>
 </div>
</div>
<div class="col-lg-6">
<div class="product-content ml-15">
<h3>
{{($products->product_name) }}
</h3>
<div class="product-review">
<div class="rating">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
<a href="#reviews" class="rating-count">4 Reviews</a>
</div>
<div class="price">
<span class="new-price">${{ $products->price }}<del>${{ $products->price }}</del></span>
<span class="in-stock">In Stock ({{ $products->quantity}} Items)</span>
</div>
<ul class="product-info">
<li>
<p>{{ $products->description }}</p>
</li>
<li>
<span>SKU:</span>
001
</li>
<li>
<span>Availability:</span>
{{ $products->availability }}
</li>
<li>
<span>Brand:</span>
{{ $products->brand }}
</li>
<li>
<span>Categories:</span>
<a href="#">Power Drill</a>
</li>
</ul>

<div class="product-add-to-cart">
<div class="input-counter">
<span class="minus-btn">
<i class="ri-add-line"></i>
</span>
<input type="text" value="1">
<span class="plus-btn">
<i class="ri-subtract-line"></i>
</span>
</div>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</div>
<div class="wishlist-btn">
<a href="#" class="default-btn">
<i class="ri-heart-line"></i>
Wishlist
</a>
</div>
<div class="share-this-product">
<ul>
<li>
<span>Share</span>
</li>
<li>
<a href="https://www.facebook.com/" target="_blank">
<i class="ri-facebook-fill"></i>
</a>
</li>
<li>
<a href="https://www.instagram.com/" target="_blank">
<i class="ri-instagram-line"></i>
</a>
</li>
<li>
<a href="https://www.linkedin.com/" target="_blank">
<i class="ri-linkedin-fill"></i>
</a>
</li>
<li>
<a href="https://twitter.com/" target="_blank">
<i class="ri-twitter-fill"></i>
</a>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div id="reviews" class="tab products-details-tab">
<div class="row">
<div class="col-lg-12 col-md-12"> 
<ul class="tabs">
<li>
Description
</li>
<li>
Additional Information
</li>
<li>
Reviews
</li>
</ul>
</div>
<div class="col-lg-12 col-md-12">
<div class="tab_content">
<div class="tabs_item">
<div class="products-details-tab-content">
<h3>Product Description</h3>
<p>{{ $products->description }}</p>
<h3>Specification</h3>
<ul class="specification">
<li>Model: 001</li>
<li>Battery Chemistry: Lithm</li>
<li>Battery Voltage: 120V</li>
<li>Battery Capacity: 1.0Ah</li>
<li>Max Capacity In Metal: 20mm</li>
<li>Weight: 2.5kg</li>
<li>Drilling capacity: Concrete: 32 mm</li>
<li>No Load Speed:0-520 rpm</li>
</ul>
</div>
</div>
<div class="tabs_item">
<div class="products-details-tab-content">
<ul class="additional-information">
<li><span>Brand:</span> {{ $products->brand }}</li>
<li><span>Color:</span> {{ $products->color }}</li>
<li><span>Size:</span> {{ $products->size }}</li>
<li><span>Weight:</span> 27 kg</li>
<li><span>Dimensions:</span> {{ $products->dimensions }}</li>
</ul>
</div>
</div>
<div class="tabs_item">
<div class="products-details-tab-content">
<div class="product-review-form">
<h3>Customer Reviews</h3>
<div class="review-title">
<div class="rating">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
<p>Based on 3 reviews</p>
<a href="#" class="btn default-btn">Write A Review</a>
</div>
<div class="review-comments">
<div class="review-item">
<div class="rating">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
<h3>Good</h3>
<span><strong>Admin</strong> on <strong>July 18, 2021</strong></span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation labore et dolore</p>
 <a href="#" class="review-report-link">Report as Inappropriate</a>
</div>
<div class="review-item">
<div class="rating">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
<h3>Good</h3>
<span><strong>Admin</strong> on <strong>July 20, 2021</strong></span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation labore et dolore</p>
<a href="#" class="review-report-link">Report as Inappropriate</a>
</div>
<div class="review-item">
<div class="rating">
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
<i class="ri-star-fill"></i>
</div>
<h3>Good</h3>
<span><strong>Admin</strong> on <strong>July 21, 2021</strong></span>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation. ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation labore et dolore</p>
<a href="#" class="review-report-link">Report as Inappropriate</a>
</div>
</div>
<div class="review-form">
<h3>Write A Review</h3>
<form>
<div class="row">
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Name</label>
<input type="text" id="name" name="name" placeholder="Enter your name" class="form-control">
</div>
</div>
<div class="col-lg-6 col-md-6">
<div class="form-group">
<label>Email</label>
<input type="email" id="email" name="email" placeholder="Enter your email" class="form-control">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>Review Title</label>
<input type="text" id="review-title" name="review-title" placeholder="Enter your review a title" class="form-control">
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="form-group">
<label>Body of Review (1500)</label>
<textarea name="review-body" id="review-body" cols="30" rows="8" placeholder="Write your comments here" class="form-control"></textarea>
</div>
</div>
<div class="col-lg-12 col-md-12">
<button type="submit" class="btn default-btn">Submit Review</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="best-seller-area pb-30">
<div class="container">
<div class="section-title">
<h2>Related Products</h2>
</div>
<div class="best-product-slider owl-carousel owl-theme">
<div class="single-products">
<div class="product-img">
<a href="#">
<img src="{{ url('/') }}/user/assets/images/products/product-1.jpg" alt="Image">
</a>
</div>
<div class="product-content">
<a href="#" class="title">
Cordless Drill Professional Combo Drill And Screwdriver
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
<a href="#">
(03 Review)
</a>
</li>
</ul>
<ul class="products-price">
<li>
$119.00
<Del>$219.00</Del>
</li>
<li>
<span>In Stock</span>
</li>
</ul>
<ul class="products-cart-wish-view">
<li>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</li>
<li>
<a href="#" class="wish-btn">
<i class="ri-heart-line"></i>
</a>
</li>
<li>
<button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="ri-eye-line"></i>
</button>
</li>
</ul>
</div>
</div>
<div class="single-products">
<div class="product-img">
<a href="#">
<img src="{{ url('/') }}/user/assets/images/products/product-2.jpg" alt="Image">
</a>
</div>
<div class="product-content">
<a href="#" class="title">
Professional Cordless Drill Power Tools Set Competitive Price
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
<a href="#">
(03 Review)
</a>
</li>
</ul>
<ul class="products-price">
<li>
$130.00
<Del>$250.00</Del>
</li>
<li>
<span>In Stock</span>
</li>
</ul>
<ul class="products-cart-wish-view">
<li>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</li>
<li>
<a href="#" class="wish-btn">
<i class="ri-heart-line"></i>
</a>
</li>
<li>
<button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="ri-eye-line"></i>
</button>
</li>
</ul>
</div>
</div>
<div class="single-products">
<div class="product-img">
<a href="#">
<img src="{{ url('/') }}/user/assets/images/products/product-3.jpg" alt="Image">
</a>
</div>
<div class="product-content">
<a href="#" class="title">
DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool
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
<a href="#">
(03 Review)
</a>
</li>
</ul>
<ul class="products-price">
<li>
$150.00
<Del>$200.00</Del>
</li>
<li>
<span>In Stock</span>
</li>
</ul>
<ul class="products-cart-wish-view">
<li>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</li>
<li>
<a href="#" class="wish-btn">
<i class="ri-heart-line"></i>
</a>
</li>
<li>
<button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="ri-eye-line"></i>
</button>
</li>
</ul>
</div>
</div>
<div class="single-products">
<div class="product-img">
<a href="#">
<img src="{{ url('/') }}/user/assets/images/products/product-4.jpg" alt="Image">
</a>
</div>
<div class="product-content">
<a href="#" class="title">
Power Tools Set Chinese Manufacturer Production 50V
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
<a href="#">
(03 Review)
</a>
</li>
</ul>
<ul class="products-price">
<li>
$111.00
<Del>$222.00</Del>
</li>
<li>
<span>In Stock</span>
</li>
</ul>
<ul class="products-cart-wish-view">
<li>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</li>
<li>
<a href="#" class="wish-btn">
<i class="ri-heart-line"></i>
</a>
</li>
<li>
<button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="ri-eye-line"></i>
</button>
</li>
</ul>
</div>
</div>
<div class="single-products">
<div class="product-img">
<a href="#">
<img src="{{ url('/') }}/user/assets/images/products/product-5.jpg" alt="Image">
</a>
</div>
<div class="product-content">
<a href="product-details.html" class="title">
Professional Cordless Drill Power Tools Set Competitive Price
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
<a href="#">
(03 Review)
</a>
</li>
</ul>
<ul class="products-price">
<li>
$222.00
<Del>$250.00</Del>
</li>
<li>
<span>In Stock</span>
</li>
</ul>
<ul class="products-cart-wish-view">
<li>
<a href="#" class="default-btn">
<i class="ri-shopping-cart-line"></i>
Add To Cart
</a>
</li>
<li>
<a href="#" class="wish-btn">
<i class="ri-heart-line"></i>
</a>
</li>
<li>
<button class="eye-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="ri-eye-line"></i>
</button>
</li>
</ul>
</div>
</div>
</div>
</div>
</section>


  
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
    </html>
    @endsection