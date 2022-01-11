@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    @foreach ($search as $key => $value)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        <a href="{{ URL::to('/chi-tiet-san-pham/'.$value->id) }}">
                            <img src="{{ asset('upload/product/'.$value->image) }}" alt="" />
                            @if ($value->sale_price>0)
                            <h2>{{ number_format($value->sale_price) }} VND</h2>
                            @else
                            <h2>{{ number_format($value->price) }} VND</h2>
                            @endif
                            <p>{{ $value->name }}</p>
                        </a>
                        {{-- <a href="{{ URL::to('/add/'.$value->id) }}"><i class="fa fa-plus-square"></i> Thêm vào giỏ</a> --}}
                        <button data-url="{{ route('addToCart',['id' => $value->id]) }}"
                                type="button"
                                class="btn btn-default add_to_cart"
                                name="add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                        </button>
                    </form>
                </div>
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    @endforeach

</div><!--features_items-->
@endsection
