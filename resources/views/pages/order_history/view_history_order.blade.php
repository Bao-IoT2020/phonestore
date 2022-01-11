@extends('cart_layout')
@section('cart_content')
    @include('sweetalert::alert')
    <h3 style="text-align: center">CHI TIẾT ĐƠN HÀNG</h3>
    <div class="panel panel-default">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_id as $order)
                            <tr>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->customer->phone }}</td>
                                <td>{{ $order->customer->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tên người nhận</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Ghi chú</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_id as $order)
                            <tr>
                                <td>{{ $order->shipping->name }}</td>
                                <td>{{ $order->shipping->phone }}</td>
                                <td>{{ $order->shipping->email }}</td>
                                <td>{{ $order->shipping->address }}</td>
                                @if ($order->shipping->note == '')
                                    <td>Không có ghi chú</td>
                                @else
                                    <td>{{ $order->shipping->note }}</td>
                                @endif
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h5>Liệt kê chi tiết đơn hàng</h5>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá gốc</th>
                            <th>Giá khuyến mãi</th>
                            <th>Tổng tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @foreach ($order_id as $order)
                            @foreach ($order->products as $product)
                                <tr>
                                    <th scope="row">{{ $i++ }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->pivot->quantity }}</td>
                                    <td>{{ number_format($product->price) }} VND</td>
                                    <td>
                                        @if (isset($product->sale_price))
                                        {{ number_format($product->sale_price) }} VND
                                        @else
                                        Chưa có khuyến mãi
                                        @endif
                                    </td>
                                    <td>
                                        @if (isset($product->sale_price))
                                        {{ number_format($product->pivot->quantity * $product->sale_price) }} VND
                                        @else
                                        {{ number_format($product->pivot->quantity * $product->price) }} VND
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>THANH TOÁN</h5>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="font-size: 20px">Tổng tiền cần thanh toán: {{ number_format($order->total) }} VND</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
