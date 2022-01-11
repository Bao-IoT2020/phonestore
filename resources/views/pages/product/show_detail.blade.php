@extends('layout')
@section('content')



<div class="product-details"><!--product-details-->
    @foreach ($detail_product as $id => $detail )

    <div class="col-sm-5">
        <div class="view-product">
            <img style="height: 335px; width: 325px" src="{{ asset('upload/product/'.$detail->image) }}" alt="" />
        </div>
        <div id="similar-product" class="carousel slide" data-ride="carousel">
        </div>
    </div>

    <div class="col-sm-7">
        <div class="product-information url-update-cart2" data-url="{{ route('addToCart2',['id' => $detail->id]) }}"><!--/product-information-->
            <h2>{{ $detail->name}}</h2>
            {{-- <img src="{{ asset('images/product-details/rating.png') }}" alt="" />
            <form action="{{ URL::to('/cart') }}" method="post">
                @csrf --}}
                <span>
                    @if ($detail->sale_price > 0)
                    <p>Giá cũ: <del>{{ number_format($detail ->price) }} VND</del></p>
                    <span>Giá khuyến mãi: <br>{{number_format($detail->sale_price)}} VND</span>
                    @else
                    <span>Giá: {{ number_format($detail->price) }} VND</span>
                    @endif
                    <form action="{{ url('/addCart') }} " method="POST">
                        @csrf
                        <input type="hidden" name="prod_id_hidden" value="{{ $detail->id }}">
                        <p><b>Quantity: <input class="cart_quantity_input2" name="quantity" type="number" min="1" value="1"/>
                            {{-- <button type="submit" class="btn btn-fefault cart">
                                <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                            </button></b></p> --}}
                            <button data-id="{{ $detail->id }}"
                                    type="button"
                                    class="btn btn-default add_to_cart2"
                                    name="add-to-cart2">
                                    <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                            </button>
                    </form>
                </span>
            </form>
            <p><b>Tình trạng:</b> Còn hàng</p>
            <p><b>Điều kiện:</b> Mới 100%</p>
            <p><b>Thương hiệu:</b> {{ $detail->brand->name }}</p>
            <a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
        </div><!--/product-information-->

        @endforeach
    </div>
</div><!--/product-details-->

<div class="category-tab shop-details-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li  class="active"><a href="#details" data-toggle="tab">Chi tiết sản phẩm</a></li>
            <li><a href="#binhluan" data-toggle="tab">Bình luận</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="details" >
            <div class="col-sm-12">
                {{-- <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <p>{{ $detail->description }}</p>
                        </div>
                    </div>
                </div> --}}
                <p>Dung lượng pin: {{ $detail->battery }}</p>
                <p>ROM: {{ $detail->rom }}</p>
                <p>RAM: {{ $detail->ram }}</p>
                <p>Sử dụng con chip: {{ $detail->chipset }}</p>
                <p>Mô tả sản phẩm: {{ $detail->description }}</p>
            </div>
        </div>
        <div class="tab-pane fade " id="binhluan" >
            <form>
                @csrf
                <input type="hidden" class="comment_hidden_id" value="{{ $detail->id }}">
                <div id="cmt_show"></div>
                {{-- <p><b>Write Your Review</b></p> --}}

            </form>

            @php
                $cus_name = session()->get('name');
            @endphp
            <form action="#">
                <span>
                    <input class="comment_name" value="{{ $cus_name }}" type="text" placeholder="Tên bình luận"/>
                </span>
                <textarea class="comment_content" name="" placeholder="Nhận xét của bạn"></textarea>
                <b>Rating: </b> <img src="{{ asset('frontend/images/rating.png') }}" alt="" />
                <button type="button" class="btn btn-default pull-right submit-comment">
                    Gửi
                </button>
                {{-- <div id="cmt_noti"></div> --}}
            </form>
        </div>


    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Sản phẩm cùng thương hiệu</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                @foreach ($related_product as $related)
                <a href="{{ URL::to('/chi-tiet-san-pham/'.$related->id) }}">
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('upload/product/'.$related->image) }}" alt="" />
                                    @if ($related->sale_price > 0)
                                    <p><del>{{ $related->price }}</del></p>
                                    <h2>{{$related->sale_price}}</h2>
                                    @else
                                    <h2>{{ $related->price}}</h2>
                                    @endif
                                    <p>{{ $related->name }}</p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div><!--/recommended_items-->
    @endsection
