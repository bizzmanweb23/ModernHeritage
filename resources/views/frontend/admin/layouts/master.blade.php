<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

@include('frontend.admin.layouts.header')

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
   
    @include('frontend.admin.layouts.menu_header')
    @include('frontend.admin.layouts.menu')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        @yield('content')
    </div>

    <!-- BEGIN: Vendor JS-->
    <script src="{{ url('/') }}/assets/vendors/js/vendors.min.js"></script>
    <script src="{{ url('/') }}/assets/LivIconsEvo/LivIconsEvo.tools.js"></script>
    <script src="{{ url('/') }}/assets/LivIconsEvo/LivIconsEvo.defaults.js"></script>
    <script src="{{ url('/') }}/assets/LivIconsEvo/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ url('/') }}/assets/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/assets/swiper.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ url('/') }}/assets/vertical-menu-light.js"></script>
    <script src="{{ url('/') }}/assets/core/app-menu.js"></script>
    <script src="{{ url('/') }}/assets/core/app.js"></script>
    <script src="{{ url('/') }}/assets/scripts/components.js"></script>
    <script src="{{ url('/') }}/assets/scripts/footer.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ url('/') }}/assets/scripts/pages/dashboard-ecommerce.js"></script>
    <!-- END: Page JS-->

</body>
<!-- END: Body-->

</html>

