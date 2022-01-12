<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Phone Store</title>
    <link href="{{ asset('frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    {{-- <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('frontend/images/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('frontend/images/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('frontend/images/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('frontend/images/apple-touch-icon-57-precomposed.png') }}"> --}}
</head>
<!--/head-->

<body>
    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> asd</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> DH51704831@student.stu.edu.vn</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/trang-chu') }}"><img
                                    src="{{ asset('frontend/images/logo1.png') }}" height="100px" width="165px"
                                    alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                {{-- <li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li> --}}
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a>
                                <li><a href="{{ route('history') }}"><i class="fa fa-crosshairs"></i> Lịch sử mua hàng</a></li>
                                </li>
                                @php
                                    $cus_id = Session::get('cus_id');
                                    $cus_name = Session::get('name');
                                    if(isset($cus_id))
                                    {
                                @endphp
                                    <li><a href="{{ route('logOutCheckOut') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                    <p style="margin-left: 338px">Xin chào, {{ $cus_name }}</p>
                                @php
                                    }else {
                                @endphp
                                    <li><a href="{{ route('logInCheckOut') }}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                @php
                                    }
                                @endphp


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('/trang-chu') }}" class="active">Trang chủ</a></li>
                                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                        <li><a href="product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="{{ route('showCart') }}">Cart</a></li>
                                        <li><a href="login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <form action="{{ route('searchProduct') }}" method="POST">
                            @csrf
                            <div class="search_box pull-right">
                                <input style="color: black" type="text" name="keyword" placeholder="Tìm kiếm" />
                                <input style="color: black; background: #FE980F" type="submit" name="searchProd" class="btn btn-default btn-sm" value="Tìm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="col-sm-6">
                                    <h1>Iphone13</h1>
                                    <h2>Đặt trước từ 15-21/10</h2>
                                    <p>Trả góp 0%. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="width: 400px;" sizes="315x287" src="{{ asset('frontend/images/samsung-galaxy-s21-ultra-1.jpg') }}"
                                        class="girl img-responsive" alt="" />
                                    <img src="{{ asset('frontend/images/pricing.png') }}" class="pricing"
                                        alt="" />
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>Iphone13</h1>
                                    <h2>Đặt trước từ 15-21/10</h2>
                                    <p>Trả góp 0%. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="width: 400px;" src="{{ asset('frontend/images/samsung-galaxy-s21-ultra-1.jpg') }}" class="girl img-responsive"
                                        alt="" />
                                    <img src="{{ asset('frontend/images/pricing.png') }}" class="pricing"
                                        alt="" />
                                </div>
                            </div>

                            <div class="item">
                                <div class="col-sm-6">
                                    <h1>Iphone 13</h1>
                                    <h2>Đặt trước từ 15-21/10</h2>
                                    <p>Trả góp 0%. </p>
                                    <button type="button" class="btn btn-default get">Get it now</button>
                                </div>
                                <div class="col-sm-6">
                                    <img style="width: 400px;" src="{{ asset('frontend/images/samsung-galaxy-s21-ultra-1.jpg') }}" class="girl img-responsive"
                                        alt="" />
                                    <img src="{{ asset('frontend/images/pricing.png') }}" class="pricing"
                                        alt="" />
                                </div>
                            </div>

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Thương Hiệu</h2>
                        <!--category-->
                        <div class="panel-group category-products" id="accordian">
                            <div class="panel panel-default">
                                @foreach ($brands as $brand)
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><a
                                                href="{{ URL::to('/thuong-hieu/' . $brand->id) }}">{{ $brand->name }}</a>
                                            {{-- <a data-toggle="collapse" data-parent="#accordian" href="#dienthoai">
                                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                {{ $value->name }}
                                            </a> --}}
                                        </h4>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!--/category-products-->

                        {{-- <div class="brands_products"><!--brands_products-->
							<h2>Thương Hiệu</h2>
							<div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand as $key => $value)
                                        <li><a href="{{ URL::to('/thuong-hieu/'.$value->id) }}"> <span class="pull-right">(50)</span>{{ $value->name }}</a></li>
                                    @endforeach

                                </ul>
                            </div>
						</div><!--/brands_products--> --}}

                        {{-- <div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range--> --}}

                        <div class="shipping text-center">
                            <!--shipping-->
                            <img src="{{ asset('frontend/images/banner.jpg') }}" alt="" />
                        </div>
                        <!--/shipping-->

                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    @yield('content')

                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Liên hệ với chúng tôi</a></li>
                                <li><a href="#">Tình trạng đơn hàng</a></li>
                                {{-- <li><a href="#">Change Location</a></li>
                                <li><a href="#">FAQ’s</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Các thương hiệu</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Apple</a></li>
                                <li><a href="#">Samsung</a></li>
                                <li><a href="#">Xiaomi</a></li>
                                <li><a href="#">OPPO</a></li>
                                <li><a href="#">Nokia</a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Policies</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Terms of Use</a></li>
                                <li><a href="#">Privecy Policy</a></li>
                                <li><a href="#">Refund Policy</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Ticket System</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Về chúng tôi</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin website</a></li>
                                <li><a href="#">Vị trí cửa hàng</a></li>
                                {{-- <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li> --}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Đăng ký email</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Điền email của bạn" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                {{-- <p>Get the most recent updates from <br />our site and be updated your self...</p> --}}
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            {{-- <div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
				</div>
			</div> --}}
        </div>

    </footer>
    <!--/Footer-->



    <script src="{{ asset('frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>

    {{-- Thêm sản phẩm vào giỏ --}}
    <script>
        $('.add_to_cart').on('click', function addtoCart(e) {
            e.preventDefault();
            let URL = $(this).data('url');

            $.ajax({
                type: "GET",
                url: URL,
                data: "data",
                dataType: "json",
                success: function(data) {
                    if (data.code == 200) {
                        swal("Thêm vào thành công", {
                            buttons: false,
                            icon: "success",
                            timer: 1500,
                        });
                    }
                },

            });
        });
    </script>

    <script>
        $('.add_to_cart2').on('click', function addtoCart2(e) {
            e.preventDefault();
            let URL = $('.url-update-cart2').data('url');
            let id = $(this).data('id');
            let quantity = $(this).parents('div').find('input.cart_quantity_input2').val();
            //  alert(quantity);
            $.ajax({
                type: "GET",
                url: URL,
                data: {
                    id: id,
                    quantity: quantity
                },
                dataType: "json",
                success: function(data) {
                    if (data.code == 200) {
                        // alert(data);
                        swal("Thêm vào giỏ thành công", {
                            buttons: false,
                            icon: "success",
                            timer: 1500,
                        });
                    } else {
                        swal("Nhập số lượng phải lớn hơn bằng 1!!!", {
                            buttons: false,
                            icon: "error",
                            timer: 2000,
                        });
                    }
                },

            });
        });
    </script>

    {{-- Bình luận --}}
    <script>
        $(document).ready(function() {
            comment();
            function comment() {
                var cmt_id = $('.comment_hidden_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    method: "POST",
                    url: "{{ url('/comment') }}",
                    data: {
                        cmt_id: cmt_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#cmt_show').html(data);
                    }
                });
            }
            $('.submit-comment').click(function() {
                var cmt_id = $('.comment_hidden_id').val();
                var name = $('.comment_name').val();
                var content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    method: "POST",
                    url: "{{ route('submitComment')}}",
                    data: {
                        cmt_id: cmt_id,
                        name: name,
                        content: content,
                        _token: _token
                    },
                    success: function(data) {
                        if (data.code == 200) {
                        swal({
                            title: "Thêm bình luận thành công",
                            buttons: false,
                            icon: "success",
                            text: "Bình luận đang chờ duyệt",
                            timer: 5000,
                        });
                        comment();
                        $('.comment_content').val('');
                        }
                        else if(data.code == 202)
                        {
                            swal({
                            title: "Mua sản phẩm mới có thể bình luận.",
                            buttons: false,
                            icon: "error",
                            timer: 2500,
                        });
                        }
                        else {
                        swal({
                            title: "Đăng nhập để bình luận",
                            buttons: {
                                cancel: "Hủy",
                                login: {
                                    text: "Đi đến trang đăng nhập.",
                                    value: "login",
                                },
                            },
                            icon: "error",
                            // text: "Bình luận đang chờ duyệt",
                        }).
                        then((value) => {
                            switch(value)
                            {
                                case "login":
                                    window.location.href = ('/login-checkout');
                                default:
                                    break;
                            }
                        });
                    }
                },

                });
            });
        });
    </script>
</body>

</html>
