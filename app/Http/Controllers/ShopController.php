<?php

namespace App\Http\Controllers;

use App\Product;
use App\GuestCart;
use \Auth;
use \DB;
use \Session;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        // Session::forget('cart');
        // dd(Session::all());
        $products = Product::inRandomOrder()->paginate(9);
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
        if (!Session::has('cart')) {
            return view('cart')->with([
                'products' => []
            ]);
            // return view('cart');
        }

        $guestCart = Session::get('cart');
        // dd($guestCart);
        $cart = new GuestCart($guestCart);
        // dd($cart->items['iphone-x']['item'][0]['price']);
        // dd($cart->items['iphone-x']['item'][0]['name']);
        // dd($cart->totalQty);
        // dd($cart->totalPrice);

        $result =  view('cart')->with([
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
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
            $redirectPath = redirect()->route('login')->with('mustLoginFirst', 'You must login first to chekout your item(s).');
        } else {
            $redirectPath = view('checkout');
        }
        return  $redirectPath;
    }
}
