@extends('admin_layout')
@section('admin_content')
@include('sweetalert::alert')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    THÊM DANH MỤC
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/save-category')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="category_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea type="text" name="category_desc" class="form-control" id="exampleInputPassword1" style="resize: none" rows="8"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Trạng thái</label>
                                <select name="category_status" class="form-control input-sm m-bot15">
                                    <option value="0">Hiển thị</option>
                                    <option value="1">Ẩn</option>
                                </select>
                        </div>
                        <button type="submit" name="add_cate" class="btn btn-info">Thêm Danh Mục</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection
