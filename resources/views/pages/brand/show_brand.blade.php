@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    @foreach ($brand_title as $title)
        <h2 class="title text-center">{{ $title -> name }}</h2>
    @endforeach
    @foreach ($brand_id as $id)
    <a href="{{ URL::to('/chi-tiet-san-pham/'.$id->id) }}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset('upload/product/'.$id->image) }}" alt="{{ $id->name }}"/>
                            <h2>{{ number_format($id->price) }} VND</h2>
                            <p>{{ $id->name }}</p>
                            <button data-url="{{ route('addToCart',['id' => $id->id]) }}"
                                type="button"
                                class="btn btn-default add_to_cart"
                                name="add-to-cart">
                                <i class="fa fa-shopping-cart"></i>Thêm vào giỏ
                        </button>
                        </div>
                        {{-- <div class="product-overlay">
                            <div class="overlay-content">
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>
                        </div> --}}
                </div>
                <div class="choose">
                    <ul class="nav nav-pills nav-justified">
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                        <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </a>
    @endforeach

</div><!--features_items-->
@endsection
