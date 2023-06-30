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
            @include('admin.body.sidebar')
            <!--end sidebar wrapper -->
            <!--start header -->
            @include('admin.body.header')
            <!--end header -->
            <!--start page wrapper -->
            <div class="page-wrapper">
                @yield('admin')
            </div>
            <!--end page wrapper -->
            <!--start overlay-->
            <div class="overlay toggle-icon"></div>
            <!--end overlay-->
            <!--Start Back To Top Button-->
            <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            <!--start footer -->
            @include('admin.body.footer')
            <!--end footer -->
        </div>
        <!--end wrapper-->
        <!--start switcher-->
        {{--
        <div class="switcher-wrapper">
            <div class="switcher-btn"> <i class='bx bx-cog bx-spin'></i>
            </div>
            <div class="switcher-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-uppercase">Theme Customizer</h5>
                    <button type="button" class="btn-close ms-auto close-switcher" aria-label="Close"></button>
                </div>
                <hr>
                <h6 class="mb-0">Theme Styles</h6>
                <hr>
                <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="lightmode" checked="">
                        <label class="form-check-label" for="lightmode">Light</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="darkmode">
                        <label class="form-check-label" for="darkmode">Dark</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="semidark">
                        <label class="form-check-label" for="semidark">Semi Dark</label>
                    </div>
                </div>
                <hr>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="minimaltheme" name="flexRadioDefault">
                    <label class="form-check-label" for="minimaltheme">Minimal Theme</label>
                </div>
                <hr>
                <h6 class="mb-0">Header Colors</h6>
                <hr>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator headercolor1" id="headercolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor2" id="headercolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor3" id="headercolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor4" id="headercolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor5" id="headercolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor6" id="headercolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor7" id="headercolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator headercolor8" id="headercolor8"></div>
                        </div>
                    </div>
                </div>
                <hr>
                <h6 class="mb-0">Sidebar Colors</h6>
                <hr>
                <div class="header-colors-indigators">
                    <div class="row row-cols-auto g-3">
                        <div class="col">
                            <div class="indigator sidebarcolor1" id="sidebarcolor1"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor2" id="sidebarcolor2"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor3" id="sidebarcolor3"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor4" id="sidebarcolor4"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor5" id="sidebarcolor5"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor6" id="sidebarcolor6"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor7" id="sidebarcolor7"></div>
                        </div>
                        <div class="col">
                            <div class="indigator sidebarcolor8" id="sidebarcolor8"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        --}}
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
