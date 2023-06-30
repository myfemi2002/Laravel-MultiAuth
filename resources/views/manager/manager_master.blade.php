<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--favicon-->
        <link rel="icon" href="{{ asset('backend/assets/images/favicon-32x32.png') }}" type="image/png">
        <!--plugins-->
        <link href="{{ asset('backend/assets/plugins/notifications/css/lobibox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet">
        <!-- loader-->
        <link href="{{ asset('backend/assets/css/pace.min.css') }}" rel="stylesheet">
        <script src="{{ asset('backend/assets/js/pace.min.js') }}"></script>
        <!-- Bootstrap CSS -->
        <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="../../../css2.css?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('backend/assets/css/icons.css') }}" rel="stylesheet">
        <!-- Theme Style CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/dark-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/css/semi-dark.css') }}">
        <link rel="stylesheet" href="{{ asset('backend/assets/css/header-colors.css') }}">
        <link href=" {{ asset('backend/assets/toaster/toastr.css') }}" rel="stylesheet" />
        <link href=" {{ asset('backend/assets/Font-Awesome/css/all.css') }}" rel="stylesheet" />
        <title>:: @yield('title'):: Newinfo </title>
    </head>
    <body onload="info_noti()">
        <!--wrapper-->
        <div class="wrapper">
            <!--sidebar wrapper -->
            @include('manager.body.sidebar')
            <!--end sidebar wrapper -->
            <!--start header -->
            @include('manager.body.header')
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                @yield('manager')
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--start footer -->
            @include('manager.body.footer')
            <!--end footer -->
        </div>
        <!--end wrapper-->
        <!--start switcher-->

        <!--end switcher-->
        <!-- Bootstrap JS -->
        <script src="{{ asset('backend/assets/js/bootstrap.bundle.min.js') }}"></script>
        <!--plugins-->
        <script src="{{ asset('backend/assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/chartjs/js/Chart.extension.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/sparkline-charts/jquery.sparkline.min.js') }}"></script>
        {{-- <!--notification js -->
        <script src="{{ asset('backend/assets/plugins/notifications/js/lobibox.min.js') }}"></script>
        <script src="{{ asset('backend/assets/plugins/notifications/js/notifications.min.js') }}"></script> --}}
        <script src="{{ asset('backend/assets/js/index.js') }}"></script>
        <!--app JS-->
        <script src="{{ asset('backend/assets/js/app.js') }}"></script>

        <!--validation JavaScript -->
        <script src="{{ asset('backend/assets/validation/validate.min.js')}}"></script>
        <!--handlebars JavaScript -->
        <script src="{{ asset('backend/assets/handlebars/handlebars.js')}}"></script>
        <!--notify cdnjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

        {{-- sweetalert2 --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="{{ asset('backend/assets/sweetalert-code/code.js') }}"></script>
        <!-- Font-Awesome js -->
        <script src="{{ asset('backend/assets/Font-Awesome/js/all.js') }}"></script>
        <!-- Toaster js -->
        <script src="{{ asset('backend/assets/toaster/toastr.min.js') }}"></script>
        <script>
            @if (Session::has('message'))
            var type = "{{ Session::get('alert-type','info') }}"
            switch (type) {
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
            @endif
        </script>
    </body>
</html>
