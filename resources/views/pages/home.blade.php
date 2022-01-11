@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản phẩm mới</h2>
    @foreach ($product as $key => $value)
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <form>
                        {{-- @csrf
                        <input type="hidden" class="cart_product_id_{{ $value->id }}" value="{{ $value->id }}">
                        <input type="hidden" class="cart_product_name_{{ $value->id }}" value="{{ $value->name }}">
                        <input type="hidden" class="cart_product_image_{{ $value->id }}" value="{{ $value->image }}">
                        @if ($value->sale_price > 0)
                        <input type="hidden" class="cart_product_sale_price_{{ $value->id }}" value="{{ $value->sale_price }}">
                        @else
                        <input type="hidden" class="cart_product_price_{{ $value->id }}" value="{{ $value->price }}">
                        @endif --}}
                        {{-- <input type="hidden" class="cart_product_qty_{{ $value->id }}" value="1"> --}}

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

{{-- <div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#phone" data-toggle="tab">Phone</a></li>
        </ul>
    </div>
    <div class="tab-content">
        <div class="tab-pane fade active in" id="phone" >
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{ asset('frontend/images/galaxy-fold.jpg') }}" alt="" />
                            <h2>$56</h2>
                            <p>Smart phone</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                            </i>Add to cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div><!--/category-tab-->

<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">recommended items</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{ asset('frontend/images/galaxy-flip.jpg') }}" alt="" />
                                <h2>$56</h2>
                                <p>Smart phone</p>
                                <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
         <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
    </div>
</div><!--/recommended_items--> --}}

@endsection
