<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryController extends Controller
{
    public function add_cate()
    {
        return view('admin.add_category');
    }

    public function all_cate()
    {
        $all_category = DB::table('tbl_category') -> orderBy('id', 'asc') -> get();
        $manager_category = view('admin.all_category') -> with('all_cate', $all_category);

        return view('admin_layout') -> with('admin.all_category', $manager_category);
    }

    public function save_cate(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name'] = $request -> category_name;
        $data['description'] = $request -> category_desc;
        $data['status'] = $request -> category_status;
        $date = new DateTime();
        $data['created_at'] = $date;

        DB::table('tbl_category') -> insert($data);

        toast('Thêm danh mục '.'"'.$data['name'].'"'.' thành công!','success');
        return redirect('add-category');
    }

    public function active_cate($id)
    {
        DB::table('tbl_category') -> where('id', $id) -> update(['status' => 0]);
        $name = DB::table('tbl_category')->where('id', $id)->value('name');
        toast('Hiển thị danh mục '.'"'.$name.'"'.' thành công!','success');
        return redirect('all-category');
    }

    public function unactive_cate($id)
    {
        DB::table('tbl_category') -> where('id', $id) -> update(['status' => 1]);
        $name = DB::table('tbl_category')->where('id', $id)->value('name');
        toast('Ẩn danh mục '.'"'.$name.'"'.' thành công!','success');
        return redirect('all-category');
    }

    public function edit_cate($id)
    {
        $edit_category = DB::table('tbl_category') -> orderBy('id', 'asc') -> where('id', $id) -> get();
        $manager_category = view('admin.edit_category') -> with('edit_cate', $edit_category);


        return view('admin_layout') -> with('admin.edit_category', $manager_category);
    }

    public function delete_cate($id)
    {
        DB::table('tbl_category') -> where('id', $id) -> delete();
        toast('Xóa danh mục thành công!','success');

        return redirect('all-category');
    }

    public function update_cate(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name'] = $request -> category_name;
        $data['description'] = $request -> category_desc;
        $date = new DateTime();
        $data['updated_at'] = $date;

        DB::table('tbl_category') -> where('id', $id) -> update($data);
        $request->session()->put('message', 'Cập nhật danh mục thành công!');
        return redirect('all-category');
    }
    //--------------------------------------END-Admin--------------------------------------//

}
