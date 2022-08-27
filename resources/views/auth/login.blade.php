@extends('layouts.app')
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
                        <form class="user-form" method="POST" action="{{ route('login') }}" id="reset_login">
                             @csrf
                       
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" id="email" class="form-control" name="email" required
                                        autofocus>
                                        @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong style="color: red">{{ $message }}</strong>
                                                    </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" id="password" class="form-control" name="password" required>
                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong style="color: red">{{ $message }}</strong>
                                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="login-action">
                                        <span class="log-rem">
                                            <input class="custom-checkbox" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                        </span>
                                        <span class="forgot-login">
                                            <a href="forgot-password.html">Forgot your password?</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="default-btn" type="submit">
                                        Log In
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#email,#password').on('click', function(){
        $('.invalid-feedback').hide();
    });
    $('#login_refresh').on('click', function(){
        $('#reset_login').trigger("reset");
    });
</script>
@endsection


