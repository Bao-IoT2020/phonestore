@extends('cart_layout')
@section('cart_content')
<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li class="active">Thanh toán</li>
            </ol>
        </div><!--/breadcrums-->

        <div class="register-req">
            <p>THÔNG TIN GIAO HÀNG</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-3 formShipping">
                    <div class="shopper-info">
                        <form action="{{ route('saveCheckOut') }}" method="POST">
                            @csrf
                            <input required name="ship_name" value="{{ $cus_name }}" type="text" placeholder="Họ tên người nhận">
                            <input required name="ship_email" value="{{ $cus_email }}" type="email" placeholder="Email">
                            <input required name="ship_phone" value="{{ $cus_phone }}" type="text" placeholder="Số điện thoại người nhận hàng">
                            <input required name="ship_address" type="text" placeholder="Địa chỉ giao hàng">
                            <textarea name="ship_note" placeholder="Ghi chú đơn hàng......" rows="16"></textarea>
                            <input name="ship_submit" type="submit" value="Xác nhận thông tin và đặt hàng" class="btn btn-primary"></a>
                        </form>
                    </div>
                </div>
                {{-- <div class="col-sm-4">
                    <div class="order-message">
                        <textarea name="ship_note" placeholder="Ghi chú đơn hàng......" rows="16"></textarea>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="review-payment">
            <h2>XEM LẠI GIỎ HÀNG</h2>
        </div>
        <div class="table-responsive cart_info url_delete_cart" data-url="{{ route('deleteCart') }}">
            <table class="table table-condensed url_update_cart" data-url="{{ route('updateCart') }}">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td class="price">Giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="total">Tổng</td>
                        <td></td>
                    </tr>
                </thead>
                @php
                    $total = 0;
                @endphp
                <tbody>
                    @foreach ((array) $carts as $id => $cart)
                        @php
                            if (isset($cart['sale_price'])) {
                                $total += $cart['sale_price'] * $cart['quantity'];
                            } else {
                                $total += $cart['price'] * $cart['quantity'];
                            }
                            session()->put('total', $total);
                        @endphp
                        <tr>
                            <td class="cart_product">
                                <a href="#"><img style="height: 100px; width= 100px"
                                        src="{{ asset('upload/product/' . $cart['image']) }}" alt=""></a>
                            </td>
                            <td class="cart_description">
                                <h4><a href="#">{{ $cart['name'] }}</a></h4>
                            </td>
                            <td class="cart_price">
                                @if (isset($cart['sale_price']))
                                    <p><del style="font-size: 13px">Giá cũ: {{ number_format($cart['price']) }}</del>
                                    </p>
                                    <p>KM: {{ number_format($cart['sale_price']) }} VND</p>
                                @else
                                    <p>{{ number_format($cart['price']) }} VND</p>
                                @endif
                            </td>
                            <td class="cart_quantity">
                                <div class="cart_quantity_button">
                                    {{-- <a class="cart_quantity_up" href="#"> + </a> --}}
                                    <input class="cart_quantity_input" type="number" min=1 name="quantity"
                                    value="{{ $cart['quantity'] }}">
                                    {{-- <a class="cart_quantity_down" href="#"> - </a> --}}
                                </div>
                            </td>
                            <td class="cart_total">
                                @if (isset($cart['sale_price']))
                                    <p class="cart_total_price">
                                        {{ number_format($cart['sale_price'] * $cart['quantity']) }} VND</p>
                                @else
                                    <p class="cart_total_price">
                                        {{ number_format($cart['price'] * $cart['quantity']) }} VND</p>
                                @endif
                            </td>
                            <td class="cart_delete">
                                <a data-id="{{ $id }}" class="cart_quantity_refresh" href=""><i
                                        class="fa fa-refresh"></i></a>
                                <a data-id="{{ $id }}" class="cart_quantity_delete" href=""><i
                                        class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section> <!--/#cart_items-->
<section id="do_action">
    <div class="container">
        <div class="col-sm-6">
            <div class="total_area">
                <ul>
                    {{-- <li>Cart Sub Total <span>$59</span></li>
                    <li>Eco Tax <span>$2</span></li>
                    <li>Shipping Cost <span>Free</span></li> --}}
                    <li>Total <span>{{ number_format($total) }} VND</span></li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
