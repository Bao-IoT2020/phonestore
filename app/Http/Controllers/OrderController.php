<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class OrderController extends Controller
{
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id)
            return redirect('dashboard');
        else
            return redirect('admin')->send();
    }

    public function manageOrder()
    {
        $this->AdminAuthCheck();
        $all_order = DB::table('tbl_order')
            ->join('tbl_customer', 'tbl_order.customer_id', '=', 'tbl_customer.id')
            ->select('tbl_order.*', 'tbl_customer.name')
            ->orderBy('tbl_order.id', 'desc')
            ->get();
        $manager_order = view('admin.Order.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('manage_order', $manager_order);
    }

    public function viewOrder($id)
    {
        $this->AdminAuthCheck();

        $order_by_id = Order::where('id', $id)->get();
        $order_detail_id = OrderDetail::where('order_id', $id)->get();
        $manage_order_id = view('admin.Order.view_order')
            ->with('order_id', $order_by_id)
            ->with('order_detail', $order_detail_id);
        return view('admin_layout')->with('manage_order_id', $manage_order_id);
    }

    public function updateOrder(Request $request)
    {
        $data = $request->all();

        $order = Order::find($data['order_id']);
        $order->status = $data['order_status'];
        $order->save();
    }

    public function history()
    {
        $cus_id = session()->get('cus_id');
        if (!$cus_id) {
            return redirect(route('logInCheckOut'))->with('message', 'Đăng nhập để xem lịch sử mua hàng.');
        } else {
            $get_order = Order::where('customer_id', $cus_id)->orderBy('id', 'desc')->get();
            return view('pages.order_history.history')->with('get_order', $get_order);
        }
    }

    public function viewHistoryOrder($id)
    {
        $cus_id          = session()->get('cus_id');
        $order_by_id     = Order::where('id', $id)->get();
        $order_detail_id = OrderDetail::all();

        if (!$cus_id)
        {
            return redirect(route('logInCheckOut'))->with('message', 'Đăng nhập để xem lịch sử mua hàng.');
        }
        else
        {
            $manage_order_id = view('pages.order_history.view_history_order')
                             ->with('order_id', $order_by_id)
                             ->with('order_detail', $order_detail_id);
        }
        $get_order = Order::where('customer_id', $cus_id)->get();
        return view('cart_layout')
             ->with('get_order', $get_order)
             ->with('manage_order_id', $manage_order_id);
    }

    public function cancelOrder(Request $request)
    {
        $data = $request->all();
        $order = Order::where('id', $data['id'])->first();
        $order->reason_cancel = $data['reason'];
        $order->status = 3;
        $order->save();
    }
}
