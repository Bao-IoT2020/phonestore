@extends('admin_layout')
@section('admin_content')
@include('sweetalert::alert')

<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục
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
              <th>Tên danh mục</th>
              <th>Trạng thái</th>
              <th>Ngày thêm</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
              @foreach ( $all_cate as $key => $cate)
                <tr>
                    <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                    <td>{{ $cate -> name }}</td>
                    <td><span class="text-ellipsis">
                        @if($cate->status==0)
                        <a title="Ẩn danh mục" href="{{ URL::to('/unactive-category/'.$cate->id) }}"><span class="fa fa-thumbs-up"></span></a>
                        @else
                        <a title="Hiện danh mục" href="{{ URL::to('/active-category/'.$cate->id) }}"><span class="fa fa-thumbs-down"></span></a>
                        @endif
                    </span></td>
                    <td><span class="text-ellipsis">{{ date('d/m/Y', strtotime($cate->created_at)) }}</span></td>
                    <td>
                        <a title="Sửa danh mục" href="{{ URL::to('/edit-category/'.$cate->id) }}">
                            <i class="fa fa-pencil text-success text-active"></i></a>
                        <a id="delCate" onclick="return confirm('Are you sure to delete {{ $cate->name }}?')" title="Xóa danh mục" href="{{ URL::to('/delete-category/'.$cate->id) }}">
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
                $('#delCate').click(function (e) {
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






        </script>

@endsection

