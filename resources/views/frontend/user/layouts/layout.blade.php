<!doctype html>
<html lang="english">
@include('frontend.user.layouts.header')

<body>

    <div class="preloader">
        <div class="content">
            <div class="box"></div>
        </div>
    </div>

    @include('frontend.user.layouts.app')

    @yield('content')
    
    @include('frontend.user.layouts.footer')

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ url('/') }}/user/assets/js/jquery.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/meanmenu.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/owl.carousel.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/wow.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/range-slider.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/form-validator.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/contact-form-script.js"></script>

    <script src="{{ url('/') }}/user/assets/js/ajaxchimp.min.js"></script>

    <script src="{{ url('/') }}/user/assets/js/custom.js"></script>
</body>

</html>
