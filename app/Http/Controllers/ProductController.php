<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderDetail;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    // public function index()
    // {
    //     $product = Product::all();
    //     return view('pages.cart.cart',compact('products'));
    // }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id)
            return redirect('dashboard');
        else
            return redirect('admin')->send();
    }

    public function add_product()
    {
        $this->AdminAuthCheck();
        // $cate = DB::table('tbl_category')->where('status', 0)->orderBy('id', 'asc')->get();
        $brand = DB::table('tbl_brand')->where('status', 0)->orderBy('id', 'asc')->get();

        return view('admin.add_product')->with('brand', $brand);
    }

    public function all_product()
    {
        $this->AdminAuthCheck();
        // $all_product = DB::table('tbl_product')
        //                         // ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_product.brand_id')
        //                         ->orderBy('tbl_product.id', 'desc')
        //                         ->get();

        // $all_product = Product::all()->sortByDesc('id')->paginate(5);
        $all_product = Product::orderby('id', 'desc')->paginate(5);
        $count_product = Product::all()->count();
        $manager_product = view('admin.all_product')->with('all_product', $all_product)->with('count_product', $count_product);

        return view('admin_layout')->with('admin.all_product', $manager_product);
    }

    public function save_product(Request $request)
    {
        $this->AdminAuthCheck();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name']           = $request->product_name;
        $data['description']    = $request->product_desc;
        $data['image']          = $request->product_img;
        $data['price']          = $request->product_price;
        $data['sale_price']     = $request->product_sale_price;
        $data['rom']            = $request->product_rom;
        $data['ram']            = $request->product_ram;
        $data['battery']        = $request->product_battery;
        $data['screen']         = $request->product_screen;
        $data['front_camera']   = $request->product_front_cam;
        $data['rear_camera']    = $request->product_rear_cam;
        $data['chipset']        = $request->product_chipset;
        $data['status']         = $request->product_status;
        // $data['category_id']    = $request -> product_cate;
        $data['brand_id']       = $request->product_brand;
        $date = new DateTime();
        $data['created_at']     = $date;

        $product_name_exist = DB::table('tbl_product')->where('name', $request->product_name)->exists();

        $request->validate(
            [
                'product_img' => 'required|image|mimes:webp,jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $get_img = $request->file('product_img');
        if ($product_name_exist == true) {
            toast('Tên sản phẩm ' . '"' . $data['name'] . '"' . ' đã có trong CSDL!', 'error');
            return redirect('all-product');
        } elseif ($get_img) {
            $new_img = date("d-m-Y") . date("h-i-sa") . $get_img->getClientOriginalName();
            $get_img->move('../public/upload/product', $new_img);
            $data['image'] = $new_img;
            DB::table('tbl_product')->insert($data);
            toast('Thêm sản phẩm ' . '"' . $data['name'] . '"' . ' thành công!', 'success');
            return redirect('add-product');
        }

        // DB::table('tbl_product') -> insert($data);
        // return redirect('add-product');
    }

    public function active_product($id)
    {
        DB::table('tbl_product')->where('id', $id)->update(['status' => 0]);
        $name = DB::table('tbl_product')->where('id', $id)->value('name');
        toast('Hiển thị sản phẩm ' . '"' . $name . '"' . ' thành công!', 'success');
        return redirect('all-product');
    }

    public function unactive_product($id)
    {
        DB::table('tbl_product')->where('id', $id)->update(['status' => 1]);
        $name = DB::table('tbl_product')->where('id', $id)->value('name');
        toast('Ẩn sản phẩm ' . '"' . $name . '"' . ' thành công!', 'success');
        return redirect('all-product');
    }

    public function edit_product($id)
    {
        $this->AdminAuthCheck();
        $brand = DB::table('tbl_brand')->where('status', 0)->orderBy('id', 'asc')->get();

        $edit_product = DB::table('tbl_product')
            ->where('id', $id)
            ->get();

        $manager_product = view('admin.edit_product')
            ->with('edit_product', $edit_product)
            ->with('brand', $brand);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }

    public function delete_product($id)
    {
        $name = DB::table('tbl_product')->where('id', $id)->value('name');
        $prod_status = Product::where('id', $id)->value('status');
        if ($prod_status == 0) {
            toast('Không thể xóa ' . '"' . $name . '"' . ' còn đang hiển thị', 'error');
            return redirect('all-product');
        } else {
            DB::table('tbl_product')->where('id', $id)->delete();
            toast('Xóa sản phẩm ' . '"' . $name . '"' . ' thành công!', 'success');
            return redirect('all-product');
        }
    }

    public function update_product(Request $request, $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array();
        $data['name']           = $request->product_name;
        $data['description']    = $request->product_desc;
        $data['price']          = $request->product_price;
        $data['sale_price']     = $request->product_sale_price;
        $data['rom']            = $request->product_rom;
        $data['ram']            = $request->product_ram;
        $data['battery']        = $request->product_battery;
        $data['screen']         = $request->product_screen;
        $data['front_camera']   = $request->product_front_cam;
        $data['rear_camera']    = $request->product_rear_cam;
        $data['chipset']        = $request->product_chipset;
        // $data['status']         = $request -> product_status;
        // $data['category_id']    = $request -> product_cate;
        $data['brand_id']       = $request->product_brand;
        $date = new DateTime();
        $data['updated_at']     = $date;

        $get_img = $request->file('product_img');
        if ($get_img) {
            $new_img = date("d-m-Y") . date("h-i-sa") . $get_img->getClientOriginalName();
            $get_img->move('../public/upload/product', $new_img);
            $data['image'] = $new_img;
            DB::table('tbl_product')->where('id', $id)->update($data);
            toast('Cập nhật sản phẩm ' . '"' . $data['name'] . '"' . ' thành công!', 'success');
            return redirect('all-product');
        }
        DB::table('tbl_product')->where('id', $id)->update($data);

        toast('Cập nhật sản phẩm ' . '"' . $data['name'] . '"' . ' thành công!', 'success');
        return redirect('all-product');
    }
    //End-backend

    //Start-frontend
    public function detail_product($id)
    {
        $brands = Brand::where('status', 0)->get();
        $detail_product = Product::where('id', $id)->get();

        foreach ($detail_product as $detail) {
            $brand_id = $detail->brand_id;
        }
        $product_id = $detail->id;

        session()->put('id_detail_product',$product_id);

        $related_product = Product::where('brand_id', $brand_id)->whereNotIn('id', [$id])->get();
        return view('pages.product.show_detail')
            // ->with('category', $cate)
            ->with('brands', $brands)
            ->with('detail_product', $detail_product)
            ->with('related_product', $related_product);
    }

    public function comment(Request $request)
    {
        $prod_id = $request->cmt_id;
        $comment = Comment::where('product_id', $prod_id)
                          ->where('comment_parent_id',null)
                          ->where('status',0)
                          ->get();
        $comment_admin = Comment::where('comment_parent_id','>',0)->get();
        $output = '';

        foreach ($comment as $cmt)
        {

                // $date = date('H:i:s' ,strtotime($comment->created_at));
                // <li><a href=""><i class="fa fa-clock-o"></i>'.date('H:i:s' ,strtotime($cmt->created_at)).'</a></li>
                $output .= '
                <div class="col-sm-12">
                    <ul>
                        <li><a href=""><i class="fa fa-male"></i>' . $cmt->name . '</a></li>
                        <li><a href=""><i class="fa fa-calendar-o"></i>' . date('d/m/Y', strtotime($cmt->created_at)) . '</a></li>
                        <li><a href=""><i class="fa fa-clock-o"></i>' . date('H:i', strtotime($cmt->created_at)) . '</a></li>
                    </ul>
                    <p>' . $cmt->comment . '</p>
                </div>

                ';

                foreach($comment_admin as $reply)
                {
                    if($reply->comment_parent_id == $cmt->id)
                    {
                        $output .= '
                            <div class="col-sm-10" style="margin-left: 25px; margin-top: -5px">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>Admin</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>' . date('d/m/Y', strtotime($reply->created_at)) . '</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>' . date('H:i', strtotime($reply->created_at)) . '</a></li>
                                </ul>
                                <p style="color: green">'.$reply->comment.'</p>
                            </div>
                        ';
                    }
                }

        }
        echo $output;
    }

    public function submit_comment(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = new DateTime();
        $cus_id            = $request->session()->get('cus_id');
        $id_detail_product = session()->get('id_detail_product');

        //Lấy product_id từ order_detail
        $order_id          = Order::where('customer_id',$cus_id)->pluck('id')->toArray();
        $odi               = OrderDetail::pluck('order_id')->toArray();
        $pro_order_id      = DB::table('tbl_order_detail')
                                ->whereIn('order_id',array_intersect($odi,$order_id))
                                ->pluck('product_id')
                                ->toArray();
        $product_id        = DB::table('tbl_product')
                               ->whereIn('id', $pro_order_id)
                               ->pluck('id')
                               ->toArray();

        if (isset($cus_id) && in_array($id_detail_product,$product_id)) {
            $prod_id                = $request->cmt_id;
            $name                   = $request->name;
            $content                = $request->content;
            $comment                = new Comment();
            $comment->product_id    = $prod_id;
            $comment->name          = $name;
            $comment->comment       = $content;
            $comment->status        = 1;
            $comment->created_at    = $date;
            $comment->save();
        }
        elseif(isset($cus_id))
        {
            return response()->json([
                'code' => 202,
                'message' => 'success'
            ], 200);
        }
        else {
            return response()->json([
                'code' => 201,
                'message' => 'success'
            ], 200);
        }
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
    }

    public function search_product(Request $request)
    {
        $keywords  = $request->keyword;
        $search   = Product::where('name', 'like', '%' . $keywords . '%')
                           ->orderBy('id', 'desc')
                           ->get();
        $brands   = Brand::where('status', 0)->get();

        return view('pages.product.search')
            ->with('brands', $brands)
            ->with('search', $search);
    }
}
