{{-- TRANG LOGIN / SIGNUP --}}
@extends('cart_layout')
@section('cart_content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Trang chủ</a></li>
              <li class="active">Đăng nhập | Đăng ký</li>
            </ol>
        </div><!--/breadcrums-->
    </div>
</section>
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Đăng nhập</h2>
                    <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert" style="color:red; text-align: center; display:block">' . $message . '</span>';
                            Session::put('message', null);
                        }
                    ?>
                    <form action="{{ route('logIn') }}" method="POST">
                        @csrf
                        <input type="email" name="email_account" placeholder="Địa chỉ email" />
                        <input type="password" name="password_account" placeholder="Mật khẩu" />
                        <div>
                            <button name="btnLogIn" type="submit" class="btn btn-default">Đăng nhập</button>
                        </div>
                        <div class="top-right float-right text-right" style="margin-top: -20px">
                            <a href="{{ route('forgotPassword') }}" class="text-right f-w-600"> Quên mật khẩu?</a>
                        </div>
                    </form>
                </div><!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form"><!--sign up form-->
                    <h2>Đăng ký</h2>
                    <form action="{{ route('addCustomer') }}" method="POST">
                        @csrf
                        <input name="cus_name" type="text" placeholder="Nhập họ và tên"/>
                        <input name="cus_email" type="email" placeholder="Nhập địa chỉ email"/>
                        <input name="cus_phone" type="text" placeholder="Nhập số điện thoại"/>
                        <input name="cus_pass" type="password" placeholder="Nhập mật khẩu"/>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
