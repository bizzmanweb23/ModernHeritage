@extends('frontend.user.layouts.master')

@section('content')
{{-- <div class="modal fade cart-shit" id="exampleModal-cart" tabindex="-1" aria-hidden="true">
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
                            <img src="{{ url('/') }}/user/assets/images/products/product-1.jpg"
                                alt="Image">
                            <a href="#">
                                DFMALB 20V Max XX Oscillating Multi Tool Variable Speed Tool
                            </a>
                            <span>$125.00</span>
                            <i class="ri-close-fill"></i>
                        </li>
                        <li>
                            <img src="{{ url('/') }}/user/assets/images/products/product-2.jpg"
                                alt="Image">
                            <a href="#">
                                Power Tools Set Chinese Manufacturer Production 50V Lithu Battery
                            </a>
                            <span>$125.00</span>
                            <i class="ri-close-fill"></i>
                        </li>
                        <li>
                            <img src="{{ url('/') }}/user/assets/images/products/product-3.jpg"
                                alt="Image">
                            <a href="#">
                                Electrical Magnetic Impact Power Hammer Drills Machine
                            </a>
                            <span>$125.00</span>
                            <i class="ri-close-fill"></i>
                        </li>
                        <li>
                            <img src="{{ url('/') }}/user/assets/images/products/product-4.jpg"
                                alt="Image">
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
</div> --}}


<section class="hero-slider-area">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-9">
                <div class="hero-slider owl-carousel owl-theme">
                    <div class="slider-item bg-1">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="hero-slider-content">
                                    <span>Special Offer</span>
                                    <h1>High Quality Products Are Ready Here</h1>
                                    <p>Free shipping & discount 40% on products</p>
                                    <div class="hero-slider-btn">
                                        <a href="#" class="default-btn">
                                            <i class="ri-shopping-cart-line"></i>
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item bg-2">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="hero-slider-content">
                                    <span>Special Offer</span>
                                    <h1>Best Collection For Home Decoration 2021</h1>
                                    <p>Free shipping & discount 40% on products</p>
                                    <div class="banner-btn">
                                        <a href="#" class="default-btn">
                                            <i class="ri-shopping-cart-line"></i>
                                            Shop Now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slider-item bg-3">
                        <div class="d-table">
                            <div class="d-table-cell">
                                <div class="hero-slider-content">
                                    <span>Special Offer</span>
                                    <h1>All Types Of Premium Quality Tools</h1>
                                    <p>Free shipping & discount 40% on products</p>
                                    <div class="banner-btn">
                                        <a href="#" class="default-btn">
                                            <i class="ri-shopping-cart-line"></i>
                                            Shop Now
                                        </a>
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


<section class="services-area ptb-30">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <div class="icon">
                        <i class="ri-customer-service-line"></i>
                    </div>
                    <h3>Customer Support</h3>
                    <p>24/7 We are customer care best support</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <div class="icon">
                        <i class="ri-secure-payment-line"></i>
                    </div>
                    <h3>Secure Payments</h3>
                    <p>Pay with the world's top payment methods</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-services">
                    <div class="icon">
                        <i class="ri-globe-line"></i>
                    </div>
                    <h3>Worldwide Delivery</h3>
                    <p>What you want, delivered to where you want</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="best-seller-area pb-30">
    <div class="container">
        <div class="section-title">
            <h2>Best Sellers</h2>
        </div>
        <div class="best-product-slider owl-carousel owl-theme">
            <div class="single-products">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-1.jpg"
                            alt="Image">
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
                            <button class="eye-btn">
                                <i class="ri-eye-line"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="single-products">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-2.jpg"
                            alt="Image">
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
                            <button class="eye-btn">
                                <i class="ri-eye-line"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="single-products">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-3.jpg"
                            alt="Image">
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
                            <button class="eye-btn">
                                <i class="ri-eye-line"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="single-products">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-4.jpg"
                            alt="Image">
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
                            <button class="eye-btn">
                                <i class="ri-eye-line"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="single-products">
                <div class="product-img">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-5.jpg"
                            alt="Image">
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
                            <button class="eye-btn">
                                <i class="ri-eye-line"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="sale-offer-area">
    <div class="container">
        <div class="sale-offer-bg">
            <h5>Sale offer - <span>30% off</span></h5>
            <h3>All Types Of Premium Quality Tools</h3>
            <a href="#" class="default-btn">
                <i class="ri-shopping-cart-line"></i>
                Shop Now
            </a>
        </div>
    </div>
</section>


<section class="featured-products-area pt-54 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="featured-product-img">
                    <div class="featured-product-content">
                        <span class="best">Best Deals</span>
                        <h3>Premium Tools Sets</h3>
                        <span class="offer">Up to 30% off</span>
                        <a href="#">
                            Shop Now
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="section-title">
                    <h2>Featured Products</h2>
                </div>
                <div class="featured-product-wrap">
                    <div class="featured-product-slider owl-carousel owl-theme">
                        <div class="single-products">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-6.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot">Hot</span>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-products">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-7.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    Professional Cordless Drill Power Tools Competitive
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-products">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-8.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot">Hot</span>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="single-products">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-9.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>





<section class="new-arrivals-area pb-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="section-title">
                    <h2>Trending Products</h2>
                </div>
                <ul class="trending-product-list">
                    <li class="single-list">
                        <img src="{{ url('/') }}/user/assets/images/products/product-12.jpg"
                            alt="Image">
                        <div class="product-content">
                            <a href="#" class="title">
                                Good Quality Electric Cordless Drill
                            </a>
                            <ul class="products-price">
                                <li>
                                    $29.00
                                    <Del>$50.00</Del>
                                </li>
                            </ul>
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
                            </ul>
                        </div>
                    </li>
                    <li class="single-list">
                        <img src="{{ url('/') }}/user/assets/images/products/product-13.jpg"
                            alt="Image">
                        <div class="product-content">
                            <a href="#" class="title">
                                High Quality Industrial Wood Planer
                            </a>
                            <ul class="products-price">
                                <li>
                                    $19.00
                                    <Del>$30.00</Del>
                                </li>
                            </ul>
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
                            </ul>
                        </div>
                    </li>
                    <li class="single-list">
                        <img src="{{ url('/') }}/user/assets/images/products/product-14.jpg"
                            alt="Image">
                        <div class="product-content">
                            <a href="#" class="title">
                                Professional Straight Cutting Scissor
                            </a>
                            <ul class="products-price">
                                <li>
                                    $29.00
                                    <Del>$50.00</Del>
                                </li>
                            </ul>
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
                            </ul>
                        </div>
                    </li>
                    <li class="single-list">
                        <img src="{{ url('/') }}/user/assets/images/products/product-15.jpg"
                            alt="Image">
                        <div class="product-content">
                            <a href="#" class="title">
                                90 Degree Angle Square Combination Handle
                            </a>
                            <ul class="products-price">
                                <li>
                                    $10.00
                                    <Del>$15.00</Del>
                                </li>
                            </ul>
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
                            </ul>
                        </div>
                    </li>
                    <li class="single-list">
                        <img src="{{ url('/') }}/user/assets/images/products/product-16.jpg"
                            alt="Image">
                        <div class="product-content">
                            <a href="#" class="title">
                                High Quality Steel Clamp Tool
                            </a>
                            <ul class="products-price">
                                <li>
                                    $15.00
                                    <Del>$20.00</Del>
                                </li>
                            </ul>
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
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="section-title">
                    <h2>New Arrivals</h2>
                    <a href="#" class="read-more">
                        View All
                    </a>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-17.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    Electrical Magnetic Impact Power Hammer Drills
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
                                            (10 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $170.00
                                        <Del>$220.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-18.jpg"
                                        alt="Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    High Quality Electric Hand Planer, 4-3/8-Inch
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
                                            (05 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $69.00
                                        <Del>$90.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-19.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    White Whale Vacuum Cleaner High Quality
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
                                            (10 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $129.00
                                        <Del>$150.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-20.jpg"
                                        alt="Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    High Quality Carbon Steel Mini Drilling Machines
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
                                            (11 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $99.00
                                        <Del>$150.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-21.jpg"
                                        alt="Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    Power Hammer Drills 200V Machine Screwdriver
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
                                            (05 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $159.00
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-22.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    Multi-function Screw Driver Set For Home Use
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
                                            (07 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $29.00
                                        <Del>$50.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-23.jpg"
                                        alt="Image">
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    Wall Polishing Square Sander Electric Machine
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
                                            (10 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $89.00
                                        <Del>$120.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="single-products new-arrivals">
                            <div class="product-img">
                                <a href="#">
                                    <img src="{{ url('/') }}/user/assets/images/products/product-24.jpg"
                                        alt="Image">
                                </a>
                                <span class="hot new">New</span>
                            </div>
                            <div class="product-content">
                                <a href="#" class="title">
                                    High Quality Carbon Steel Professional Power Tools
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
                                            (10 Review)
                                        </a>
                                    </li>
                                </ul>
                                <ul class="products-price">
                                    <li>
                                        $99.00
                                        <Del>$130.00</Del>
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
                                        <button class="eye-btn">
                                            <i class="ri-eye-line"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="sale-discount-area pb-54">
    <div class="container">
        <div class="sale-discount-bg">
            <div class="discount-content">
                <h5>Get Discount 30% Off</h5>
                <h3>New Lower Prices On Hundreds Premium Quality Tools</h3>
            </div>
        </div>
    </div>
</section>


<section class="popular-categories-area pb-30">
    <div class="container">
        <div class="section-title">
            <h2>Popular Categories</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-25.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Power Tools
                        </a>
                    </h3>
                    <span>15 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories bg-eff5ff">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-26.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Machine Tools
                        </a>
                    </h3>
                    <span>05 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories bg-ebf1f5">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-27.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Hand Tools
                        </a>
                    </h3>
                    <span>18 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories bg-ebf9ea">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-28.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Cordless Tools
                        </a>
                    </h3>
                    <span>19 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories bg-fff8e5">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-29.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Welding & Soldering
                        </a>
                    </h3>
                    <span>04 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="single-categories bg-f3f1ff">
                    <a href="#">
                        <img src="{{ url('/') }}/user/assets/images/products/product-30.png"
                            alt="Image">
                    </a>
                    <h3>
                        <a href="#">
                            Socket Wrenches
                        </a>
                    </h3>
                    <span>12 Products</span>
                    <a href="#" class="read-more">
                        Shop Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>





<div class="partner-area pb-54">
    <div class="container">
        <div class="partner-wrap">
            <div class="partner-slider owl-carousel owl-theme">
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-1.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-2.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-3.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-4.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-5.png" alt="Image">
                </div>
                <div class="partner-item">
                    <img src="{{ url('/') }}/user/assets/images/partners/partner-6.png" alt="Image">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="go-top">
    <i class="ri-arrow-up-s-fill"></i>
    <i class="ri-arrow-up-s-fill"></i>
</div>
@endsection