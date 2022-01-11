<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>ADMIN</title>


    <!--[if lt IE 10]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    {{-- <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app"> --}}
    <meta name="author" content="colorlib" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/s/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/waves.min.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('backend/css/feather.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/font-awesome-n.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/chartist.css') }}" rel="stylesheet" type="text/css" media="all">
    <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/css/widget.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('backend/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/css/jquery.filer.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('backend/css/jquery.filer-dragdropbox-theme.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('backend/css/pages.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="{{ url('/dashboard') }}">
                            <img style="height: 86px; width: 100px; margin-right: 20px" class="img-fluid"
                                src="{{ asset('backend/images/logo.jpg') }}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li class="header-search">
                                <div class="main-search morphsearch-search">
                                    <div class="input-group">
                                        <span class="input-group-prepend search-close">
                                            <i class="feather icon-x input-group-text"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Enter Keyword">
                                        <span class="input-group-append search-btn">
                                            <i class="feather icon-search input-group-text"></i>
                                        </span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="#!"
                                    onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                                    class="waves-effect waves-light" data-cf-modified-d2d1d6e2f87cbebdf4013b26-="">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('backend/images/avatar-4.jpg') }}" class="img-radius"
                                            alt="User-Profile-Image">
                                        <span>Bảo nè</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="#!">
                                                <i class="feather icon-settings"></i> Settings
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="feather icon-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="email-inbox.html">
                                                <i class="feather icon-mail"></i> My Messages
                                            </a>
                                        </li>
                                        <li>
                                            <a href="auth-lock-screen.html">
                                                <i class="feather icon-lock"></i> Lock Screen
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ url('/logout') }}">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-star"></i></span>
                                            <span class="pcoded-mtext">Thương hiệu</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ url('/add-brand') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Thêm thương hiệu</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ url('/all-brand') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Liệt kê thương hiệu</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-star"></i></span>
                                            <span class="pcoded-mtext">Sản phẩm</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{ url('/add-product') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Thêm sản phẩm</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{ url('/all-product') }}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Liệt kê sản phẩm</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class=" ">
                                        <a href="{{ url('/all-comment') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-star"></i>
                                            </span>
                                            <span class="pcoded-mtext">Bình luận</span>
                                        </a>
                                    </li>
                                    <li class=" ">
                                        <a href="{{ route('manageorder') }}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-star"></i>
                                            </span>
                                            <span class="pcoded-mtext">Đơn hàng</span>
                                        </a>
                                    </li>
                            </div>
                        </div>
                </div>
                <div class="pcoded-content">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                            <div class="page-wrapper">
                                <div class="page-body">
                                    @yield('admin_content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--[if lt IE 10]>
<div class="ie-warning">
<h1>Warning!!</h1>
<p>You are using an outdated version of Internet Explorer, please upgrade
<br/>to any of the following web browsers to access this website.
</p>
<div class="iew-container">
<ul class="iew-download">
    <li>
        <a href="http://www.google.com/chrome/">
            <img src="../files/s/images/browser/chrome.png" alt="Chrome">
            <div>Chrome</div>
        </a>
    </li>
    <li>
        <a href="https://www.mozilla.org/en-US/firefox/new/">
            <img src="../files/s/images/browser/firefox.png" alt="Firefox">
            <div>Firefox</div>
        </a>
    </li>
    <li>
        <a href="http://www.opera.com">
            <img src="../files/s/images/browser/opera.png" alt="Opera">
            <div>Opera</div>
        </a>
    </li>
    <li>
        <a href="https://www.apple.com/safari/">
            <img src="../files/s/images/browser/safari.png" alt="Safari">
            <div>Safari</div>
        </a>
    </li>
    <li>
        <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
            <img src="../files/s/images/browser/ie.png" alt="">
            <div>IE (9 & above)</div>
        </a>
    </li>
</ul>
</div>
<p>Sorry for the inconvenience!</p>
</div>
<![endif]-->



    <script src="{{ asset('backend/js/email-decode.min.js') }}" data-cfasync="false"></script>
    <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/waves.min.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('backend/js/curvedlines.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('backend/js/chartist.js') }}"></script>
    <script src="{{ asset('backend/js/amcharts.js') }}"></script>
    <script src="{{ asset('backend/js/serial.js') }}"></script>
    <script src="{{ asset('backend/js/light.js') }}"></script>
    <script src="{{ asset('backend/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('backend/js/vertical-layout.min.js') }}"></script>
    <script src="{{ asset('backend/js/custom-dashboard.min.js') }}"></script>
    <script src="{{ asset('backend/js/script.min.js') }}"></script>

    <script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>
    {{-- Format Product Price --}}
    <script src="{{ asset('backend/js/inputmask.js') }}"></script>
    <script src="{{ asset('backend/js/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('backend/js/autonumeric.js') }}"></script>
    <script src="{{ asset('backend/js/form-mask.js') }}"></script>





    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

    <script src="{{ asset('backend/js/rocket-loader.min.js') }}" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49"
        defer=""></script>

    {{-- Cập nhật trạng thái đơn hàng --}}
    <script>
        $('.order_status').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(':selected').attr('id');
            var _token = $('input[name="_token"]').val();

            $.ajax({
                    type: "POST",
                    url: "{{ route('updateOrder') }}",
                    data: {
                        _token: _token,
                        order_status: order_status,
                        order_id: order_id
                    },
                    success: function(data) {
                        swal("Cập nhật trạng thái đơn hàng thành công.", {
                                buttons: "OK",
                                icon: "success",
                            }).then((value)=>{
                                location.reload();
                            });
                }
            });
        });
    </script>

    {{-- Trả lời bình luận --}}
    <script>
        $('.btn-reply-comment').click(function () {
            var comment_id = $(this).data('comment-id');
            var comment = $('.reply_comment_'+comment_id).val();
            var product_id = $(this).data('product-id');

            $.ajax({
                type: "POST",
                url: "{{ route('replyComment') }}",
                headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {
                    comment   : comment,
                    product_id: product_id,
                    comment_id: comment_id
                },
                success: function (data) {
                    $('.reply_comment_'+comment_id).val('');
                    // swal("Trả lời bình luận thành công.", {
                    //             buttons: "OK",
                    //             icon: "success",
                    //         }).then((value)=>{
                    //             location.reload();
                    //         });
                }
            });
        });
    </script>

</body>

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:08:25 GMT -->

</html>
