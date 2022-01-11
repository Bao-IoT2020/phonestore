@extends('admin_layout')
@section('admin_content')
@include('sweetalert::alert')
    <div class="card">
        <div class="card-header">
            {{-- <h5>(Hiện tổng có {{ $count_comment }} bình luận)</h5> --}}
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
                            <th>Duyệt</th>
                            <th>Bình luận</th>
                            <th>Tên người gửi</th>
                            <th>Ngày gửi</th>
                            <th>Sản phẩm</th>
                            <th>Xóa bình luận</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $cmt)

                            <tr>
                                <td>
                                    @if ($cmt->status == 0)
                                        <a style="margin-left: 7px" title="Ẩn bình luận" href="{{ 'unactive-comment/' . $cmt->id }}">
                                            <i class="fa fa-toggle-on"></i></a>
                                    @else
                                        <a style="margin-left: 7px" title="Duyệt bình luận" href="{{ 'active-comment/' . $cmt->id }}">
                                            <i class="fa fa-toggle-off"></i></a>
                                    @endif
                                </td>
                                <td>{{ $cmt->comment }}
                                    <style type="text/css">
                                        ul.rep_cmt li{
                                            list-style-type: decimal;
                                            color: dodgerblue;
                                            margin: 5px 40px;
                                            font-weight: bold;
                                        }
                                    </style>
                                    <ul class="rep_cmt">
                                        Trả lời:
                                        @foreach ($reply_comment as $reply)
                                            @if ($reply->comment_parent_id == $cmt->id)
                                                <li>{{ $reply->comment }}</li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    @if ($cmt->status == 0)
                                        <br><textarea class="form-control reply_comment_{{ $cmt->id }}" rows="3"></textarea>
                                        <br><button data-comment-id="{{ $cmt->id }}" data-product-id="{{ $cmt->product_id }}" class="btn btn-default btn-sm btn-reply-comment">Trả lời</button>
                                    @endif
                                </td>
                                <td>{{ $cmt->name }}</td>
                                <td>{{ date('H:i', strtotime($cmt->created_at)) }} {{ date('d/m/Y', strtotime($cmt->created_at)) }}</td>
                                <td><a href="{{ url('/chi-tiet-san-pham/'.$cmt->product->id)}}">{{ $cmt->product->name }}</a></td>
                                <th><a title="Xóa bình luận" href="{{ route('deleteComment', ['id' => $cmt->id]) }}"
                                    onclick="return confirm('Bạn có chắc xóa bình luận này không?')">
                                    <i style="font-size: 18px; margin-left: 40px" class="fas fa-trash"></i></a></th>
                            </tr>
                        @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
