@extends('admin_layout')
@section('admin_content')
    @include('sweetalert::alert')

    <div class="card">
        <div class="card-header">
            <h5>Thêm Thương Hiệu</h5>
        </div>
        <div class="card-block">
            {{-- <h4 class="sub-title">Basic Inputs</h4> --}}
            <form role="form" action="{{ URL::to('/save-brand') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tên thương hiệu</label>
                    <div class="col-sm-10">
                        <input required type="text" name="brand_name" class="form-control form-control-capitalize" placeholder="Nhập tên thương hiệu">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Mô tả thương hiệu</label>
                    <div class="col-sm-10">
                        <textarea required rows="5" cols="5" name="brand_desc" class="form-control" placeholder="Mô tả thương hiệu"></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Trạng thái</label>
                    <div class="col-sm-10">
                        <select name="brand_status" class="form-control">
                            <option value="0">Hiển thị</option>
                            <option value="1">Ẩn</option>
                        </select>
                    </div>
                </div>
                <button type="submit" name="add_brand" class="btn btn-primary btn-round waves-effect waves-light">Thêm thương hiệu</button>
            </form>
        </div>
    </div>
@endsection
