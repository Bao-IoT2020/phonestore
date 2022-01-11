@extends('admin_layout')
@section('admin_content')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">
            <h5>THÔNG TIN ĐĂNG NHẬP</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
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

    <div class="card">
        <div class="card-header">
            <h5>THÔNG TIN VẬN CHUYỂN</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
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

    <div class="card">
        <div class="card-header">
            <h5>CHI TIẾT ĐƠN HÀNG</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
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
                            <tr>
                                <td>
                                    @foreach ($order_id as $key => $order)
                                    @if ($order->status == 0)
                                        <form action="">
                                            @csrf
                                            <select style="width: 25%" name="product_brand" class="form-control form-control-default order_status">
                                                <option id="{{ $order->id }}" selected value="0">Chưa xử lý</option>
                                                <option id="{{ $order->id }}" value="1">Đã xử lý</option>
                                                <option id="{{ $order->id }}" value="2">Đã giao hàng</option>
                                            </select>
                                        </form>
                                    @elseif ($order->status == 1)
                                        <form action="">
                                            @csrf
                                            <select style="width: 25%" name="product_brand" class="form-control form-control-default order_status">
                                                <option id="{{ $order->id }}" value="0">Chưa xử lý</option>
                                                <option id="{{ $order->id }}" selected value="1">Đã xử lý</option>
                                                <option id="{{ $order->id }}" value="2">Đã giao hàng</option>
                                            </select>
                                        </form>
                                    @else
                                    <form action="">
                                        @csrf
                                        <select style="width: 25%" name="product_brand" class="form-control form-control-default order_status">
                                            <option disabled id="{{ $order->id }}" value="0">Chưa xử lý</option>
                                            <option disabled id="{{ $order->id }}" value="1">Đã xử lý</option>
                                            <option id="{{ $order->id }}" selected value="2">Đã giao hàng</option>
                                        </select>
                                    </form>
                                    @endif

                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
