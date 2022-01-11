<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CheckOutController extends Controller
{
    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        return redirect('dashboard');
        else
        return redirect('admin')->send();
    }
    //Front-End
    public function logIn(Request $request)
    {
        $user_email  = $request->email_account;
        $user_pass = md5($request->password_account);

        $email  = DB::table('tbl_customer')->where('email', $user_email)->first();
        $pass   = DB::table('tbl_customer')->where('password', $user_pass)->first();
        $result = DB::table('tbl_customer')
                    ->where('email', $user_email)
                    ->where('password', $user_pass)
                    ->first();

        if($result)
        {
            $request->session()->put('cus_id', $result->id);
            $request->session()->put('name', $result->name);
            $request->session()->put('email', $result->email);
            $request->session()->put('phone', $result->phone);
            return redirect('/');
        }elseif($email == true && $pass ==false){
            alert('Mật khẩu sai
            Vui lòng nhập lại','','error');
            return redirect()->back();
        }
        elseif($email == false){
            alert('Email không tồn tại.','','error');
            return redirect()->back();
        }
        else
        {
            alert('Mật khẩu sai
            Vui lòng nhập lại','','error');
            return redirect()->back();
        }
    }

    public function logInCheckOut()
    {
        return view('pages.checkout.checkout_login');
    }

    public function logOutCheckOut(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }

    public function addCustomer(Request $request)
    {
        $data = array();
        $data['name']       = $request->cus_name;
        $data['email']      = $request->cus_email;
        $data['phone']      = $request->cus_phone;
        $data['password']   = md5($request->cus_pass);

        $cus_id = DB::table('tbl_customer')->insertGetId($data);

        $request->session()->put('cus_id', $cus_id);
        $request->session()->put('name', $request->cus_name);
        $request->session()->put('email', $request->cus_email);
        $request->session()->put('phone', $request->cus_phone);
        $request->session()->put('password', $request->cus_pass);

        return redirect(route('checkOut'));
    }

    public function checkOut()
    {
        $carts = session()->get('cart');
        if($carts != null)
        {
            $cus_name = session()->get('name');
            $cus_email = session()->get('email');
            $cus_phone = session()->get('phone');
            return view('pages.checkout.checkout', compact('carts','cus_name','cus_email','cus_phone'));
        }
        else
        {
            alert('Có gì trong giỏ đâu mà đặt...');
            return redirect(route('showCart'));
        }
    }

    public function saveCheckOut(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data               = array();
        $date               = new DateTime();
        $data['name']       = $request->ship_name;
        $data['email']      = $request->ship_email;
        $data['phone']      = $request->ship_phone;
        $data['note']       = $request->ship_note;
        $data['address']    = $request->ship_address;
        $data['created_at'] = $date;
        $ship_id            = DB::table('tbl_shipping')->insertGetId($data);
        $request->session()->put('ship_id', $ship_id);

        $order = array();
        $order['customer_id'] = $request->session()->get('cus_id');
        $order['shipping_id'] = $request->session()->get('ship_id');
        $order['total']       = $request->session()->get('total');
        $order['status']      = '0';
        $order['created_at']  = $date;
        $order_id             = DB::table('tbl_order')->insertGetId($order);
        $request->session()->put('order_id', $order_id);

        $carts = session()->get('cart');
        foreach($carts as $id => $cart)
        {
            $order_detail = array();
            $order_detail['order_id']   = $request->session()->get('order_id');
            $order_detail['product_id'] = $id;
            $order_detail['quantity']   = $cart['quantity'];
            $order_detail['price']      = $cart['price'];
            $order_detail['sale_price'] = $cart['sale_price'];
            $order_detail['created_at'] = $date;
            $order_detail_id            = DB::table('tbl_order_detail')->insert($order_detail);
        }


        alert('Đặt hàng thành công','','succes');
        session()->forget('cart');
        return redirect(route('history'));
    }

    public function forgotPassword(Request $request)
    {
        return view('pages.checkout.forgot_pass');
    }

    public function recoverPass(Request $request)
    {
        $data = $request->all();
        $date = Carbon::now()->format('d/m/Y');
        $title_email = "Phonestore Reset Password".' '.$date;
        $customer = DB::table('tbl_customer')->where('email','=',$data['cus_email'])->get();
        foreach($customer as $key => $value)
        {
            $id = $value->id;
        }

        $count_cus = $customer->count();
        if($count_cus == 0)
        {
            alert('Email chưa đăng ký','','error');
            return redirect()->back();
        }
        else
        {
            $token = Str::random(6);
            DB::table('tbl_customer')->where('id', $id)->update(['token'=>$token]);

            $send_email = $data['cus_email'];
            $link_reset = url('/update-pass?email='.$send_email.'&token='.$token);
            $data = array(
                            "name"=>$title_email,
                            "body"=>$link_reset,
                            'email'=>$data['cus_email']
                        );
            Mail::send('pages.checkout.link_reset', ['data'=>$data], function($message) use ($title_email, $data){
                $message->to($data['email'])->subject($title_email);
                $message->from($data['email'],$title_email);
            });
            alert('Vào email của bạn để nhận link đặt lại mật khẩu.');
            return redirect()->back();
        }
    }

    public function updatePassword()
    {
        return view('pages.checkout.update_pass');
    }

    public function saveNewPass(Request $request)
    {
        $data = $request->all();
        $token = Str::random(6);
        $customer = DB::table('tbl_customer')
                      ->where('token','=',$data['token'])
                      ->where('email','=',$data['email'])
                      ->get();
        foreach($customer as $key =>$value)
        {
            $id = $value->id;
        }
        $count_cus = $customer->count();
        if($count_cus == 0)
        {
            alert('Nhập lại email vì link quá hạn.','','error');
            return redirect(route('forgotPassword'));
        }
        else
        {
            session()->forget('cus_pass');
            $newPass = md5($data['cus_pass']);
            DB::table('tbl_customer')->where('id',$id)->update(['token'=>$token, 'password'=>$newPass]);
            return redirect(route('logInCheckOut'))->with('message','Cập nhật mật khẩu thành công. Vui lòng đăng nhập');
        }
    }
}
