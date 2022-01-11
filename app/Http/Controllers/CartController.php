<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use DateTime;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        } else {
            $cart[$id] = [
                'name'          => $product->name,
                'price'         => $product->price,
                'sale_price'    => $product->sale_price,
                'image'         => $product->image,
                'quantity'      => 1
            ];
        }
        // session()->forget('cart');
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);

        echo "<pre>";
        print_r(session()->get('cart'));
    }

    public function addToCart2(Request $request, $id)
    {
        $product = Product::find($id);
        $cart = session()->get('cart');
        if (isset($cart[$id]) && $request->quantity > 0) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $request->quantity;
        } elseif (
            isset($cart[$id]) && $request->quantity < 0
            || isset($cart[$id]) == false && $request->quantity < 0
            || isset($cart[$id]) && $request->quantity == 0
            || isset($cart[$id]) == false && $request->quantity == 0
        ) {
            return response()->json([
                'code' => '',
            ], 200);
        } else {
            $cart[$id] = [
                'name'          => $product->name,
                'price'         => $product->price,
                'sale_price'    => $product->sale_price,
                'image'         => $product->image,
                'quantity'      => $request->quantity
            ];
        }
        // session()->forget('cart');

        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);

        // echo "<pre>";
        // print_r(session()->get('cart'));

    }

    public function showCart()
    {
        $carts = session()->get('cart');
        return view('pages.cart.cart', compact('carts'));
    }

    public function updateCart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $carts = session()->get('cart');
            if ($request->quantity > 0) {
                $carts[$request->id]['quantity'] = $request->quantity;
                session()->put('cart', $carts);
                return response()->json([
                    'code' => 200,
                    'message' => 'success'
                ], 200);
            } elseif ($request->quantity < 0) {
                $carts[$request->id]['quantity'] = 1;
                session()->put('cart', $carts);
                return response()->json([
                    'code' => '',
                    'message' => 'success'
                ], 200);
            }
        } else {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            return response()->json([
                'code' => 200,
            ], 200);
        }
    }

    public function deleteCart(Request $request)
    {
        if ($request->id) {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            return response()->json([
                'code' => 200,
            ], 200);
        }
    }
}
