@extends('admin_layout')
@section('admin_content')
@include('sweetalert::alert')

<div class="card">
    <div class="card-header">
        <h5>Cập nhật sản phẩm</h5>
    </div>
    <div class="card-block">
        @foreach ($edit_product as $key => $edit)
        <h4 class="sub-title">Cập nhật sản phẩm "{{ $edit->name }}"</h4>
        <form role="form" action="{{ URL::to('/update-product/'.$edit->id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" id="product_name" name="product_name" class="form-control form-control-capitalize"
                        value="{{ $edit->name }}">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Hình sản phẩm</label>
                <div class="col-sm-10">
                    <input type="file" id="product_img" name="product_img" class="form-control">
                    <img src="/upload/product/{{ $edit -> image }}" style="height: 100px; width: 100px">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Giá sản phẩm</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->price }}" type="number" id="product_price" name="product_price" class="form-control "
                    min=0 placeholder="Nhập giá sản phẩm" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Giá khuyến mãi(nếu có)</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->sale_price }}" type="number" id="product_sale_price" name="product_sale_price" class="form-control "
                    min=0 placeholder="Nhập giá khyến mãi" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">ROM</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->rom }}" type="text" id="product_rom" name="product_rom" class="form-control" placeholder="Nhập ROM" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RAM</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->rom }}" type="text" id="product_ram" name="product_ram" class="form-control" placeholder="Nhập RAM" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Dung lượng pin</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->battery }}" type="text" id="priduct_battery" name="product_battery" class="form-control autonumber"
                    data-a-sign=" mAh" data-p-sign="s" data-v-min="0" data-v-max="999999" placeholder="Nhập dung lượng pin" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Công nghệ màn hình</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->screen }}" type="text" id="product_screen" name="product_screen" class="form-control" placeholder="Công nghệ màn hình" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thông số camere trước</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->front_camera }}" type="text" id="product_front_cam" name="product_front_cam" class="form-control" placeholder="Thông số camera trước" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thông số camere sau</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->rear_camera }}" type="text" id="product_rear_cam" name="product_rear_cam" class="form-control" placeholder="Thông số camera sau" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Loại chipset</label>
                <div class="col-sm-10">
                    <input value="{{ $edit->chipset }}" type="text" id="product_chipset" name="product_chipset" class="form-control" placeholder="Loại chipset" />
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                    <textarea required rows="5" cols="5" id="product_desc" name="product_desc" class="form-control" placeholder="Mô tả sản phẩm">{{ $edit->description }}
                    </textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Thương hiệu sản phẩm</label>
                <div class="col-sm-10">
                    <select name="product_brand" class="form-control form-control-default">
                        @foreach ($brand as $key => $brn)
                            @if ($brn->id == $edit->brand_id)
                            <option selected value="{{ $brn->id }}">{{ $brn->name }}</option>
                            @else
                            <option value="{{ $brn->id }}">{{ $brn->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="form-group row">
                <label class="col-sm-2 col-form-label">Trạng thái</label>
                <div class="col-sm-10">
                    <select name="product_status" class="form-control form-control-default">
                        <option value="0">Hiển thị</option>
                        <option value="1">Ẩn</option>
                    </select>
                </div>
            </div> --}}
            <button type="submit" name="update_product" class="btn btn-primary btn-round waves-effect waves-light">Cập nhật sản phẩm</button>
        </form>
    </div>
    @endforeach
</div>


{{-- <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT SẢN PHẨM
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_product as $key => $pro)
                        <form role="form" action="{{URL::to('/update-product/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="font-weight-semibold">Tên sản phẩm</label>
                                <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $pro->name }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Hình sản phẩm</label>
                                <input type="file" name="product_img" class="form-control" id="product_img">
                                <img src="/upload/product/{{ $pro -> image }}" style="height: 100px; width: 100px">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Giá sản phẩm</label>
                                <input type="number" name="product_price" class="form-control" id="product_price" value="{{ $pro->price }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Giá khuyến mãi(nếu có)</label>
                                <input type="number" name="product_sale_price" class="form-control" id="product_sale_price" value="{{ $pro->sale_price }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">ROM</label>
                                <input type="text" name="product_rom" class="form-control" id="product_rom" value="{{ $pro->rom }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">RAM</label>
                                <input type="text" name="product_ram" class="form-control" id="product_ram" value="{{ $pro->ram }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Dung lượng pin</label>
                                <input type="text" name="product_battery" class="form-control" id="product_battery" value="{{ $pro->battery }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Công nghệ màn hình</label>
                                <input type="text" name="product_screen" class="form-control" id="product_screen" value="{{ $pro->screen }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Thông số camera trước</label>
                                <input type="text" name="product_front_cam" class="form-control" id="product_front_cam" value="{{ $pro->front_camera }}">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-semibold">Thông số camera sau</label>
                                <input type="text" name="product_rear_cam" class="form-control" id="product_rear_cam" value="{{ $pro->rear_camera }}">
                            </div>

                            <div class="form-group">
                                <label for="font-weight-semibold">Loại chipset</label>
                                <input type="text" name="product_chipset" class="form-control" id="product_chipset" value="{{ $pro->chipset }}">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea type="text" name="product_desc" class="form-control" id="product_desc" style="resize: none" rows="8">{{ $pro->description }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach ($category as $key => $cate)
                                            @if ($cate->id == $pro->category_id)
                                                <option selected value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @else
                                                <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach ($brand as $key => $brn)
                                            @if ($brn->id == $pro->brand_id)
                                            <option selected value="{{ $brn->id }}">{{ $brn->name }}</option>
                                            @else
                                            <option value="{{ $brn->id }}">{{ $brn->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Trạng thái</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                            </div>
                        <button type="submit" name="add_product" class="btn btn-info">Cập Nhật sản phẩm</button>
                    </form>
                    @endforeach
                    </div>
                </div>
            </section>
    </div>
</div> --}}
@endsection
