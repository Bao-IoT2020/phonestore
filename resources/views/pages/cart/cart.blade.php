@extends('cart_layout')
@section('cart_content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ '/' }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                    <li>
                        @php
                            echo Session::get('id');
                        @endphp
                    </li>
                </ol>
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
    </section>
    <!--/#cart_items-->

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
                    {{-- <a class="btn btn-default update" href="">Update</a> --}}
                    @php
                        $cus_id = Session::get('cus_id');
                        $cus_name = Session::get('name');
                        if(isset($cus_id))
                        {
                    @endphp
                        <a class="btn btn-default check_out" style="margin-left: 40px" href="{{ route('checkOut') }}">Đặt hàng</a>
                    @php
                        }else {
                    @endphp
                    <a class="btn btn-default check_out" style="margin-left: 40px" href="{{ route('logInCheckOut') }}">Đặt hàng </a>
                    @php
                        }
                    @endphp
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--/#do_action-->

@endsection
