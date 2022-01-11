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
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

</head>
<!--/head-->

<body>
    @include('sweetalert::alert')

    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0909239774</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> DH51704831@student.stu.edu.vn</a></li>
                            </ul>
                        </div>
                    </div>
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
                                <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                                <li><a href="{{ route('showCart') }}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                                @php
                                    $cus_id = Session::get('cus_id');
                                    $cus_name = Session::get('name');
                                    if(isset($cus_id))
                                    {
                                @endphp
                                    <li><a href="{{ route('logOutCheckOut') }}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
                                    <p style="margin-left: 181px">Xin chào, {{ $cus_name }}</p>
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

        <section>
            <div class="container">
                <div class="row">

                    {{-- <div class="col-sm-9 padding-right"> --}}

                        @yield('cart_content')

                    {{-- </div> --}}

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
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

        {{-- Update số lượng sản phầm trong Cart --}}
        <script>
            $('.cart_quantity_refresh').on('click', function cartUpdate(event) {
                event.preventDefault();
                let urlUpdateCart = $('.url_update_cart').data('url');
                let id = $(this).data('id');
                let quantity = $(this).parents('tr').find('input.cart_quantity_input').val();
                // alert(quantity);
                $.ajax({
                    type: "GET",
                    url: urlUpdateCart,
                    data: {
                        id: id,
                        quantity: quantity
                    },
                    success: function(data) {
                        if (data.code === 200) {
                            location.reload();
                        }
                        else{
                            location.reload();
                            swal("Nhập số lượng phải lớn hơn bằng 1!!!", {
                            buttons: false,
                            icon: "error",
                            timer: 2000,
                            });
                        }
                    },
                    error: function() {

                    }
                });
            });
        </script>

        {{-- Xóa sản phẩm ra khỏi giỏ --}}
        <script>
            $('.cart_quantity_delete').on('click', function deleteCart(event) {
                event.preventDefault();
                let id = $(this).data('id');
                let urlDeleteCart = $('.url_delete_cart').data('url');
                $.ajax({
                    type: "GET",
                    url: urlDeleteCart,
                    data: {id:id},
                    success: function (data) {
                        if(data.code === 200)
                        {
                            location.reload();
                        }
                    }
                });
            });
        </script>

        <script>
            function cancelOrder(id) {
                var id = id;
                var reason = $('.reason_cancel').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    type: "POST",
                    url: "{{ route('cancelOrder') }}",
                    data: {id:id,
                           reason:reason,
                           _token:_token
                        },
                    success: function (data) {
                        alert('Hủy đơn thành công!');
                        location.reload();
                    }
                });
             }
        </script>
</body>

</html>
