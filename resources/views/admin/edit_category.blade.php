@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT DANH MỤC
                </header>
                <div class="panel-body">
                    @foreach ( $edit_cate as $key => $edit )
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-category/'.$edit -> id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" value="{{ $edit -> name }}" name="category_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea type="text" name="category_desc" class="form-control" style="resize: none" rows="8">{{ $edit -> description }}</textarea>
                            </div>
                            <button type="submit" name="update_cate" class="btn btn-info">Cập Nhật Danh Mục</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>
    </div>
</div>
@endsection
