{{-- TRANG QUÊN MẬT KHẨU --}}
@extends('cart_layout')
@section('cart_content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="/">Trang chủ</a></li>
              <li class="active">Đặt lại mật khẩu</li>
            </ol>
        </div><!--/breadcrums-->
    </div>
</section>
<section id="form forgot-pass" style="display: block; margin-bottom: 185px;"><!--form-->
    <div class="container" >
        <div class="row">
            <div class="col-sm-4 forgot-pass" style="margin-left: 35%">
                <div class="signup-form"><!--sign up form-->
                    @php
                        $token = $_GET['token'];
                        $email = $_GET['email'];
                    @endphp
                    <h2>Chọn mật khẩu mới</h2>
                    <form action="{{ route('saveNewPass') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        <input name="cus_pass" type="text" placeholder="Nhập mật khẩu mới"/>
                        <button type="submit" class="btn btn-default">Xác nhận</button>
                    </form>
                </div><!--/sign up form-->
            </div>
        </div>
    </div>
</section><!--/form-->
@endsection
