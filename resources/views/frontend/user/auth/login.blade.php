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
                <li class="active">Login</li>
            </ul>
        </div>
    </div>
</div>
<section class="user-area ptb-54">
    <div class="container">
        <div class="site-login">
            <div class="row no-gutter">
                <div class="col-md-2"></div>
                <div class="col-md-3">
                    <img src="assets/images/login-img.jpeg" alt="">
                </div>
                <div class="col-lg-5">
                    <div class="user-form-content log-in-50 mr-15">
                        <h3>Log In</h3>
                        <form class="user-form">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" type="text" name="email">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="login-action">
                                        <span class="log-rem">
                                            <input id="remember-2" type="checkbox">
                                            <label>Keep me logged in</label>
                                        </span>
                                        <span class="forgot-login">
                                            <a href="forgot-password.html">Forgot your password?</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="default-btn" type="submit">
                                        Log in
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>


            </div>
        </div>
    </div>
</section>
@endsection
