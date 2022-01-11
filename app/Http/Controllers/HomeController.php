<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;
use App\Models\Product;

class HomeController extends Controller
{
     public function index()
     {
        // $cate = DB::table('tbl_category')->where('status', 0)->orderBy('id', 'asc')->get();
        // $brand = DB::table('tbl_brand')->where('status', 0)->orderBy('id', 'asc')->get();
        // $product = DB::table('tbl_product')->where('status',0)->orderBy('id', 'desc')->get();
        // ->join('tbl_brand', 'tbl_brand.id', '=', 'tbl_product.brand_id')
        $brands = Brand::where('status',0)->get();
        $products = Product::where('status',0)->orderBy('id','desc')->get();

        return view('pages.home')->with('brands', $brands)->with('product', $products);
     }
}
