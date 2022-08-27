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
                <li class="active">Register</li>
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
                        <h3>Register</h3>
                        <form class="user-form" action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control @error('user_name') is-invalid @enderror" value="{{ old('user_name') }}" id="user_name" name="user_name">
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email">
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Phone No</label>
                                        <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong style="color: red">{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Retype-Password</label>
                                        <input type="password" class="form-control" id="password-confirm" name="password_confirmation">
                                    </div>
                                </div>
                                <div class="col-12">
                                            <input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required />
                                            <label class="form-control-label" for="register-agree">I agree to the
                                                privacy policy</label>
                                        </div>
                                <div class="col-12">
                                    <button class="default-btn" type="submit">
                                        Sign Up
                                    </button>
                                </div>
</div>
</form>
</div>
</div>
</div>
</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#email,#user_name,#password,#confirm-password').on('click', function() {
        $('.invalid-feedback').hide();
    });
    $('#register_refresh').on('click', function() {
        $('#reset_register').trigger("reset");
    });
</script>
@endsection
