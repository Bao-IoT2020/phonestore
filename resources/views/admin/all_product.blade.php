@extends('admin_layout')
@section('admin_content')
@include('sweetalert::alert')


<div class="card">
    <div class="card-header">
        <h5>Danh sách sản phẩm (Hiện tổng có {{ $count_product }} sản phẩm)</h5>
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
                        <th>Tên sản phẩm</th>
                        <th>Hình sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>TEST</th>
                        <th>Giá khuyến mãi</th>
                        <th>Trạng thái</th>
                        <th>Ngày thêm</th>
                        <th>Sửa/Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_product as $key => $pro)
                        <tr>
                            <td>{{ $pro -> name }}</td>
                            <td><img src="/upload/product/{{ $pro -> image }}" height="100" width="100" alt="image"></td>
                            <td>{{ number_format($pro -> price) }} VND</td>
                            <td>{{ $pro->name }} - {{ number_format($pro->price) }}</td>
                            <td>
                                @if (isset($pro->sale_price))
                                    <a>{{ number_format($pro->sale_price) }} VND</a>
                                @else
                                    <a>Chưa có khuyến mãi</a>
                                @endif
                            </td>
                            <td><span class="text-ellipsis">
                                @if($pro->status==0)
                                <a style="margin-left: 25px" title="Ẩn sản phẩm" href="{{ URL::to('/unactive-product/'.$pro->id) }}">
                                    <i class="fa fa-toggle-on"></i></a>
                                @else
                                <a style="margin-left: 25px" title="Hiện sản phẩm" href="{{ URL::to('/active-product/'.$pro->id) }}">
                                    <i class="fa fa-toggle-off"></i></a>
                                @endif
                            </span></td>
                            <td><span class="text-ellipsis">{{ date('d/m/Y', strtotime($pro->created_at)) }}</span></td>
                            <td>
                                <a title="Sửa sản phẩm" href="{{ 'edit-product/' . $pro->id }} ">
                                    <i style="margin-left: 5px; font-size: 18px" class="fas fa-pencil-alt"></i></a><span
                                    style="font-size: 20px"> /</span>
                                <a title="Xóa sản phẩm" href="{{ 'delete-product/' . $pro->id }}"
                                    onclick="return confirm('Are you sure to delete {{ $pro->name }} ?')">
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

