<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin_login');
    }

    public function AdminAuthCheck()
    {
        $admin_id = Session::get('admin_id');
        if($admin_id)
        return redirect('dashboard');
        else
        return redirect('admin')->send();
    }

    public function show_dashboard()
    {
        $this->AdminAuthCheck();
        return view('admin.dashboard');
    }


    public function dashboard(Request $request)
    {
        $admin_email = $request -> admin_email;
        $admin_password = $request -> admin_password;

        $result = DB::table('tbl_admin') -> where('email', $admin_email) -> where('password', $admin_password) -> first();
        $email  = DB::table('tbl_admin') -> where('email', $admin_email) ->first();
        $pass   = DB::table('tbl_admin') -> where('password', $admin_password) ->first();
        if($result==true)
        {
            $request->session()->put('admin_id', $result->id);
            $request->session()->put('admin_name', $result->name);
            return redirect('/dashboard');
        }
        elseif($email == false && $pass == true)
        {
            $request->session()->put('message', 'Email sai. Vui lòng nhập lại.');
            return redirect('/admin');
        }
        elseif($pass == false && $email == true)
        {
            $request->session()->put('message', 'Mật khẩu sai. Vui lòng nhập lại.');
            return redirect('/admin');
        }
        else
        {
            // Session::put('message', 'Email bạn nhập không kết nối với tài khoản nào.');
            $request->session()->put('message', 'Email bạn nhập không kết nối với tài khoản nào.');
            return redirect('/admin');
        }
    }

    public function logout()
    {
        $this->AdminAuthCheck();
        Session::put('admin_name', null);
        Session::put('admin_id', null);
        return redirect('/admin');
    }
}
