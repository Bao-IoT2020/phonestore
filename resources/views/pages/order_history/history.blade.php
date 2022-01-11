@extends('cart_layout')
@section('cart_content')
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
                            <th>Mã đơn hàng</th>
                            <th>Thời gian đặt hàng</th>
                            <th>Tình trạng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($get_order as $key => $order)
                            <tr>
                                <th scope="row">{{ $i++ }}</th>
                                <td style="text-align: ">{{ $order->id }}</td>
                                <td>{{ date('H:m:s - d/m/Y', strtotime($order->created_at)) }}</td>
                                <td>
                                    @if ($order->status == 0)
                                        Chưa xử lý
                                    @elseif ($order->status == 1)
                                        Đã xử lý
                                    @elseif($order->status == 2)
                                        Đã giao hàng
                                    @else
                                        Đơn hàng đã hủy
                                    @endif
                                </td>
                                <td>
                                    <!-- Trigger the modal with a button -->
                                    @if ($order->status != 3 && $order->status != 2)
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#cancelOrder">Hủy đơn hàng</button>
                                    @endif

                                    <!-- Modal -->
                                    <div id="cancelOrder" class="modal fade" role="dialog">
                                        <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <form>
                                                @csrf
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Lí do hủy đơn hàng.</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea required class="reason_cancel" cols="30" rows="10" placeholder="Lí do hủy đơn hàng....."></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Đóng</button>
                                                        <button type="button" class="btn btn-success" id="{{ $order->id }}" onclick="cancelOrder(this.id)">Gửi</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                    <p><a title="Xem đơn hàng"
                                            href="{{ route('viewHistoryOrder', ['id' => $order->id]) }}">
                                            Xem đơn hàng</a><span style="font-size: 20px"></span></p>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
