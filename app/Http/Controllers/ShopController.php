<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use App\Admin;
use App\GuestCart;
use \DB;
use \Session;
use \Auth;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Session::forget('cart');
        // dd(Session::all());
        $products = Product::inRandomOrder()
        // ->where('quantity', '>', 0)
        ->paginate(9);
        return view('welcome')->with('products', $products);
    }

    public function guestAddToCart(Request $request, $slug)
    {
        $cartItem = Product::where('slug', $slug)->get();
        $oldItem = Session::has('cart') ? Session::get('cart') : null;
        // dd($oldItem);
        $cart = new GuestCart($oldItem);
        $cart->addGuestItemCart($cartItem, $cartItem[0]->slug);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
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
        // dd($guestCart);
        $cart = new GuestCart($guestCart);
        // dd($cart->items['iphone-x']['item'][0]['price']);
        // dd($cart->items['iphone-x']['item'][0]['name']);
        // dd($cart->totalQty);
        // dd($cart->totalPrice);
        if (Auth::guard('admin')->check()) {
            return view('admin');
        } else {
            $result =  view('cart')->with([
                'products' => $cart->items,
                'totalQty' => $cart->totalQty,
                'totalPrice' => $cart->totalPrice
            ]);
        }
        
        // dd($result);
        // dd($cart->items);
        // dd($cart->totalPrice);
        // dd($result->products->totalPrice);
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
            // dd($cart->items);

            $customers = User::customerCheckOutInfo(Auth::user()->id);
            if (Auth::guard('web')->check()) {
                $redirectPath = view('admin');
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

    // public function storeCheckout()
    // {
        
    // }
}