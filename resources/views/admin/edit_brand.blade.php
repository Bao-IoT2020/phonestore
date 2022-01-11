@extends('admin_layout')
@section('admin_content')
    {{-- <div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    CẬP NHẬT THƯƠNG HIỆU
                </header>
                <div class="panel-body">
                    @foreach ($edit_brand as $key => $edit)
                        <div class="position-center">
                            <form role="form" action="{{URL::to('/update-brand/'.$edit -> id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" value="{{ $edit -> name }}" name="brand_name" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                <textarea type="text" name="brand_desc" class="form-control" style="resize: none" rows="8">{{ $edit -> description }}</textarea>
                            </div>
                            <button type="submit" name="update_brand" class="btn btn-info">Cập Nhật Thương Hiệu</button>
                        </form>
                        </div>
                    @endforeach
                </div>
            </section>
    </div>
</div> --}}

    <div class="card">
        <div class="card-header">
            <h5>Cập Nhật Thương Hiệu</h5>
        </div>
        <div class="card-block">
            @foreach ($edit_brand as $key => $edit)
                <h4 class="sub-title">Cập nhật thương hiệu "{{ $edit->name }}"</h4>
                <form role="form" action="{{ URL::to('/update-brand/' . $edit->id) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tên thương hiệu</label>
                        <div class="col-sm-10">
                            <input required value="{{ $edit->name }}" type="text" name="brand_name"
                                class="form-control form-control-capitalize">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Mô tả thương hiệu</label>
                        <div class="col-sm-10">
                            <textarea required rows="5" cols="5" name="brand_desc"
                                class="form-control">{{ $edit->description }}</textarea>
                        </div>
                    </div>
                    <button type="submit" name="update_brand" class="btn btn-primary btn-round waves-effect waves-light">Cập nhật thương hiệu</button>
                </form>
            @endforeach
        </div>
    </div>

@endsection
