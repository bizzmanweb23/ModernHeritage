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
                <li class="active">Registration</li>
            </ul>
        </div>
    </div>
</div>
<section class="user-area ptb-54">
    <div class="container">
        <div class="site-login">
            <h3 class="text-center mb-4">Registration</h3>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 box-shadow">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Enter name"> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Enter email"> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Enter phone"> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder=" Country"> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder=" Password"> <br>
                        </div>
                        <div class="col-md-6">
                            <input type="password" class="form-control" placeholder=" Confirm password"> <br>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="default-btn disabled btn-block"
                                style="pointer-events: all; cursor: pointer; width: 100%;">
                                <span>Submit</span>
                            </button>
                        </div>
                    </div>


                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>
</section>
@endsection