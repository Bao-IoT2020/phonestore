{{-- TRANG QUÊN MẬT KHẨU --}}
@extends('cart_layout')
@section('cart_content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Trang chủ</a></li>
              <li class="active">Tìm tài khoản của bạn</li>
            </ol>
        </div><!--/breadcrums-->
    </div>
</section>
<section id="form forgot-pass" style="display: block; margin-bottom: 185px;"><!--form-->
    <div class="container" >
        <div class="row">
            <div class="col-sm-4 forgot-pass" style="margin-left: 35%">
                <div class="signup-form"><!--sign up form-->
                    <h2>Vui lòng nhập email để tìm kiếm tài khoản của bạn.</h2>
                    <form action="{{ route('recoverPass') }}" method="POST">
                        @csrf
                        <input name="cus_email" type="email" placeholder="Nhập địa chỉ email"/>
                        <button type="submit" class="btn btn-default">Gửi email</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
