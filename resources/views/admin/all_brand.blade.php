@extends('admin_layout')
@section('admin_content')
    @include('sweetalert::alert')
    {{-- <div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê thương hiệu
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox"><i></i>
                </label>
              </th>
              <th>Tên thương hiệu</th>
              <th>Trạng thái</th>
              <th>Ngày thêm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ($all_brand as $key => $brand)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $brand -> name }}</td>
                    <td><span class="text-ellipsis">
                        @if ($brand->status == 0)
                        <a title="Ẩn thương hiệu" href="{{ URL::to('/unactive-brand/'.$brand->id) }}"><span class="fa fa-thumbs-up"></span></a>
                        @else
                        <a title="Hiện thương hiệu" href="{{ URL::to('/active-brand/'.$brand->id) }}"><span class="fa fa-thumbs-down"></span></a>
                        @endif
                    </span></td>
                    <td><span class="text-ellipsis">{{ date('d/m/Y', strtotime($brand->created_at)) }}</span></td>
                    <td>
                        <a title="Sửa thương hiệu" href="{{ URL::to('/edit-brand/'.$brand->id) }}">
                            <i class="fa fa-pencil text-success text-active"></i></a>
                        <a id="delbrand" onclick="return confirm('Are you sure to delete {{ $brand->name }} ?')" title="Xóa thương hiệu" href="{{ URL::to('/delete-brand/'.$brand->id) }}">
                            <i class="fa fa-trash text-danger text"></i></a>
                    </td>
                </tr>
              @endforeach
          </tbody>
        </table>
      </div>


      <footer class="panel-footer">
        <div class="row">

          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function deleteConfirm()
            {
                $('#delbrand').click(function (e) {
                e.preventDefault();
                Swal.fire({
                title: 'Chắc chắn xóa?',
                text: "Bạn chắc chắn xóa?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                        )
                    }
                    });
                });
                // var form = event.target.form;
                // Swal.fire({
                //     title: 'Are you sure?',
                //     text: "You won't be able to revert this!",
                //     icon: 'warning',
                //     showCancelButton: true,
                //     confirmButtonColor: '#3085d6',
                //     cancelButtonColor: '#d33',
                //     confirmButtonText: 'Yes, delete it!'
                //     },
                //     function(isConfirm)
                //     {
                //         if (isConfirm) {
                //             form.submit();
                //         } else {
                //             Swal.fire("Cancelled", "Your imaginary file is safe :)", "error");
                //         }
                //     }
                // });
            }






        </script> --}}

    <div class="card">
        <div class="card-header">
            <h5>Danh sách thương hiệu (Hiện tổng có {{ $count_brand }} thương hiệu)</h5>
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block table-border-style">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên thương hiệu</th>
                            <th>Trạng thái</th>
                            <th>Ngày thêm</th>
                            <th>Sửa/Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_brand as $key => $brand)

                            <tr>
                                <th scope="row">{{ $brand->id }}</th>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    @if ($brand->status == 0)
                                        <a title="Ẩn thương hiệu" href="{{ 'unactive-brand/' . $brand->id }}"><i
                                                class="fa fa-toggle-on"></i></a>
                                    @else
                                        <a title="Hiển thị thương hiệu" href="{{ 'active-brand/' . $brand->id }}"><i
                                                class="fa fa-toggle-off"></i></a>
                                    @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($brand->created_at)) }}</td>
                                <td>
                                    <a title="Sửa thương hiệu" href="{{ 'edit-brand/' . $brand->id }} ">
                                        <i style="margin-left: 8px; font-size: 18px" class="fas fa-pencil-alt"></i></a><span
                                        style="font-size: 20px"> /</span>

                                    <a title="Xóa thương hiệu" href="{{ 'delete-brand/' . $brand->id }}"
                                        {{-- onclick="return confirm('Are you sure to delete {{ $brand->name }} ?')"> --}}
                                        onclick="return ">
                                        <i style="font-size: 18px" class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
