@extends('admin_layout')
@section('admin_content')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-header">
            <h5>Danh sách đơn đặt hàng</h5>
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
                            <th>Tên người đặt</th>
                            <th>Tổng giá tiền</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                            <th>Lí do hủy</th>
                            <th>Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($all_order as $key => $order)

                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td>{{$order->name}}</td>
                                <td>{{ number_format($order->total) }} VND</td>
                                <td>{{ date('d/m/Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    @if ($order->status == 0)
                                    Chưa xử lý
                                    @elseif ($order->status == 1)
                                    Đã xử lý
                                    @elseif($order->status == 2)
                                    Đã giao hàng
                                    @else
                                    Đơn hàng đã bị hủy
                                    @endif
                                </td>
                                <td>{{ $order->reason_cancel }}</td>
                                <td>
                                    <a title="Xem đơn hàng" href="{{ route('vieworder',['id' => $order->id]) }}">
                                        <i style="margin-left: 8px; font-size: 18px" class="fas fa-pencil-alt"></i></a><span
                                        style="font-size: 20px"> /</span>

                                    <a title="Xóa đơn hàng" href="{{ route('deleteCart', ['id' => $order->id]) }}"
                                        onclick="return confirm('Xóa đơn hàng của {{$order->name }} ?')">
                                        <i style="font-size: 18px" class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
