@extends('admin_layout')
@section('admin_content')
    @include('sweetalert::alert')
        <div class="card">
        <div class="card-header">
            <h5>Thêm Sản Phẩm</h5>
        </div>
        <div class="card-block">
            {{-- <h4 class="sub-title">Basic Inputs</h4> --}}
            <form role="form" action="{{ URL::to('/save-product') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ 'File ảnh không đúng định dạng' }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_name" name="product_name"
                            class="form-control form-control-capitalize" placeholder="Nhập tên sản phẩm">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Hình sản phẩm</label>
                    <div class="col-sm-10">
                        <input required type="file" id="product_img" name="product_img" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Giá sản phẩm</label>
                    <div class="col-sm-10">
                        <input required type="number" id="product_price" name="product_price" class="form-control" min=0
                        placeholder="Nhập giá sản phẩm" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Giá khuyến mãi(nếu có)</label>
                    <div class="col-sm-10">
                        <input type="number" id="product_sale_price" name="product_sale_price" class="form-control " min=0
                            placeholder="Nhập giá khyến mãi" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">ROM</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_rom" name="product_rom" data-v-min="0" data-v-max="9999"
                            data-a-sign="GB" data-p-sign="s" class="form-control autonumber" placeholder="Nhập ROM" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">RAM</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_ram" name="product_ram" data-v-min="0" data-v-max="999"
                            data-a-sign="GB" data-p-sign="s" class="form-control autonumber" placeholder="Nhập RAM" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Dung lượng pin</label>
                    <div class="col-sm-10">
                        <input required type="text" id="priduct_battery" name="product_battery"
                            class="form-control autonumber" data-a-sign=" mAh" data-p-sign="s" data-v-min="0"
                            data-v-max="999999" placeholder="Nhập dung lượng pin" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Công nghệ màn hình</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_screen" name="product_screen" class="form-control"
                            placeholder="Công nghệ màn hình" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Thông số camera trước</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_front_cam" name="product_front_cam" class="form-control"
                            placeholder="Thông số camera trước" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Thông số camera sau</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_rear_cam" name="product_rear_cam" class="form-control"
                            placeholder="Thông số camera sau" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Loại chipset</label>
                    <div class="col-sm-10">
                        <input required type="text" id="product_chipset" name="product_chipset" class="form-control"
                            placeholder="Loại chipset" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                    <div class="col-sm-10">
                        <textarea required rows="5" cols="5" id="product_desc" name="product_desc" class="form-control"
                            placeholder="Mô tả sản phẩm"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Thương hiệu sản phẩm</label>
                    <div class="col-sm-10">
                        <select required name="product_brand" class="form-control form-control-default">
                            <option selected disabled value="">Chọn thương hiệu</option>
                            @foreach ($brand as $key => $brn)
                                <option value="{{ $brn->id }}">{{ $brn->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-10">
                        <select name="product_status" class="form-control form-control-default">
                            <option value="0">Hiển thị</option>
                            <option selected value="1">Ẩn</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add_product" class="btn btn-primary btn-round waves-effect waves-light">Thêm sản
                    phẩm</button>
            </form>
        </div>
    </div>
@endsection
