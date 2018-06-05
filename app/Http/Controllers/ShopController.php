<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Admin;
use App\GuestCart;
use App\SalesTransaction;
use \DB;
use \Session;
use \Auth;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()
        ->paginate(9);
        return view('welcome')->with('products', $products);
    }

    public function guestAddToCart(Request $request, $slug)
    {
        $cartItem = Product::where('slug', $slug)->get();
        $oldItem = Session::has('cart') ? Session::get('cart') : null;
        $cart = new GuestCart($oldItem);
        $cart->addGuestItemCart($cartItem, $cartItem[0]->slug);
        $request->session()->put('cart', $cart);
        return redirect()->route('shop.index')->with('addSuccess', 'Item was successfully added to cart!');
    }

    public function showCart()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin');
        } else {
            if (!Session::has('cart')) {
                return view('cart')->with([
                    'products' => [],
                    'totalQty' => null,
                    'totalPrice' => null
                ]);
            }
        }

        $guestCart = Session::get('cart');
        $cart = new GuestCart($guestCart);

        if (Auth::guard('admin')->check()) {
            return view('admin');
        } else {
            $result =  view('cart')->with([
                'products' => $cart->items,
                'totalQty' => $cart->totalQty,
                'totalPrice' => $cart->totalPrice
            ]);
        }
        return $result;
    }

    public function showCheckout()
    {
        $redirectPath;
        if (!Auth::check()) {
            $redirectPath = redirect()->route('login')->with('mustLoginFirst', 'You must login first to check your item(s) out.');
        } else {
            if (!Session::has('cart')) {
                return view('cart')->with([
                    'products' => []
                ]);
            }

            $cartItems = Session::get('cart');
            $cart = new GuestCart($cartItems);

            $customers = User::customerCheckOutInfo(Auth::user()->id);
            if (Auth::guard('web')->check()) {
                $redirectPath = view('checkout')->with([
                    'products' => $cart->items,
                    'totalQty' => $cart->totalQty,
                    'totalPrice' => $cart->totalPrice,
                    'customers' => $customers
                ]);
            }
        }
        return $redirectPath;
    }

    public function storeCheckout()
    {
        $guestCart = Session::get('cart');
        $cart = new GuestCart($guestCart);
        $arr1 = [];
        foreach ($cart->items as $key => $value) {
            $arr1[$key] = $value;
        }
        $arr2 = [];
        foreach ($arr1 as $value) {
            $arr2[] = $value;
        }
        $arr3 = [];
        foreach ($arr2 as $value) {
            $arr3[] = $value;
        }
        $arr4 = [];
        foreach ($arr3 as $value) {
            $arr4[] = $value;
        }
        $arr5 = [];
        for ($i = 0; $i < count($arr4); $i++) {
            $arr5[] = $arr4[$i]['qty'];
        }
        
        $trans_date = date('Y-m-d');
        $order_code = date('YmdHms') . Auth::user()->id . $cart->totalQty;
        $user_email = Auth::user()->email;
        $cartItems = $cart->items;
        $totalQty = $cart->totalQty;
        $totalPrice = $cart->totalPrice;
        $user_id = Auth::user()->id;

        $items = [];
        foreach ($cartItems as $key => $value) {
            $items[$key] = implode('~', $value);
        }

        $stData = new SalesTransaction;
        $new = implode(',', $items);        
        $stData->transaction_date = $trans_date;
        $stData->order_code = $order_code;
        $stData->customer_email = $user_email;
        $stData->items = $new;
        $stData->sold_quantity = $totalQty;
        $stData->total_amount = $totalPrice;
        $stData->user_id = $user_id;

        if (Auth::check() && $stData->save()) {

            for ($i = 0; $i < count($arr1); $i++) {
                DB::table('products')
                ->where('slug', isset($arr3[$i]['item'][0]['slug']) ? $arr3[$i]['item'][0]['slug'] : null)
                ->decrement('quantity', $arr5[$i]);
            }

            $result = redirect()->route('shop.index')->with('orderSuccess', 'Your order has been successfuly submitted. Your order code is '. $order_code);
            
        } else {

            $result = redirect()->route('shop.checkout')->with('orderError', 'Something went wrong when processing your order, please try again.');
        }
        Session::forget('cart');
        return $result;
    }
}
