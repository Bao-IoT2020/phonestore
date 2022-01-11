<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


use App\Models\Product;
use Symfony\Component\Console\Input\Input;

class BrandController extends Controller
{

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id)
            return redirect('dashboard');
        else
            return redirect('admin')->send();
    }

    public function add_brand()
    {
        $this->AdminAuthCheck();

        return view('admin.add_brand');
    }

    public function all_brand()
    {
        $this->AdminAuthCheck();

        // $all_brand = DB::table('tbl_brand') -> orderBy('id', 'desc') -> get();
        $all_brand = Brand::all()->sortByDesc('id');
        $count_brand = Brand::all()->count();
        $manager_brand = view('admin.all_brand')->with('all_brand', $all_brand)->with('count_brand', $count_brand);

        return view('admin_layout')->with('admin.all_brand', $manager_brand);
    }

    public function save_brand(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name'] = $request->brand_name;
        $data['description'] = $request->brand_desc;
        $data['status'] = $request->brand_status;
        $date = new DateTime();
        $data['created_at'] = $date;

        if (DB::table('tbl_brand')->where('name', $request->brand_name)->exists()) {
            toast('Đã có tên thương hiệu ' . '"' . $data['name'] . '"' . ' trong CSDL!', 'error');
            return redirect('add-brand');
        } else {
            DB::table('tbl_brand')->insert($data);

            toast('Thêm thương hiệu ' . '"' . $data['name'] . '"' . ' thành công!', 'success');
            return redirect('add-brand');
        }
    }

    public function active_brand($id)
    {
        DB::table('tbl_brand')->where('id', $id)->update(['status' => 0]);
        $name = DB::table('tbl_brand')->where('id', $id)->value('name');
        toast('Hiển thị thương hiệu ' . '"' . $name . '"' . ' thành công!', 'success');
        return redirect('all-brand');
    }

    public function unactive_brand($id)
    {
        DB::table('tbl_brand')->where('id', $id)->update(['status' => 1]);
        $name = DB::table('tbl_brand')->where('id', $id)->value('name');
        toast('Ẩn thương hiệu ' . '"' . $name . '"' . ' thành công!', 'success');
        return redirect('all-brand');
    }

    public function edit_brand($id)
    {
        $this->AdminAuthCheck();

        $edit_brand = DB::table('tbl_brand')->orderBy('id', 'asc')->where('id', $id)->get();
        $manager_brand = view('admin.edit_brand')->with('edit_brand', $edit_brand);

        return view('admin_layout')->with('admin.edit_brand', $manager_brand);
    }

    public function delete_brand($id)
    {
        $brand_status = Brand::where('id', $id)->value('status');
        $brand_prod = Product::where('brand_id', $id)->exists();
        if ($brand_status == 0) {
            toast('Không thể xóa Thương hiệu còn đang hiển thị!', 'error');
            return redirect('all-brand');
        } elseif ($brand_prod) {
            toast('Còn sản phẩm trong thương hiệu!', 'error');
            return redirect('all-brand');
        } else {
            $name = DB::table('tbl_brand')->where('id', $id)->value('name');
            DB::table('tbl_brand')->where('id', $id)->delete();
            toast('Xóa thương hiệu ' . '"' . $name . '"' . ' thành công!', 'success');
            return redirect('all-brand');
        }
    }

    public function update_brand(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name'] = $request->brand_name;
        $data['description'] = $request->brand_desc;
        $date = new DateTime();
        $data['updated_at'] = $date;

        DB::table('tbl_brand')->where('id', $id)->update($data);
        toast('Cập nhật thương hiệu thành công!', 'success');
        return redirect('all-brand');
    }
    //-----------------------------END-Admin-----------------------------//

    public function show_brand($id)
    {
        // $brand = DB::table('tbl_brand')->where('status', 0)->orderBy('id', 'asc')->get();
        // $brand_id = DB::table('tbl_product')
        //                     // ->join('tbl_brand', 'tbl_product.brand_id','=','tbl_brand.id')
        //                     ->where('tbl_product.brand_id', $id)
        //                     ->get();



        // $brand_title = DB::table('tbl_product')
        //                     ->join('tbl_brand', 'tbl_product.brand_id','=','tbl_brand.id')
        //                     ->where('tbl_product.brand_id', $id)
        //                     ->limit(1)
        //                     ->get();

        $brands = Brand::where('status', 0)->get();
        $brand_id = Product::where('brand_id', $id)->get();
        $brand_title = Brand::where('id', $id)->get();

        return view('pages.brand.show_brand')
            ->with('brands', $brands)
            ->with('brand_id', $brand_id)
            ->with('brand_title', $brand_title);
    }
}
