<?php

namespace App\Http\Controllers;

use App\Product;
use \DB;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::inRandomOrder()->paginate(9);
        return view('welcome')->with('products', $products);
    }

    public function guestAddToCart($slug)
    {
        $item = Product::guestGetItem($slug);
        // dd($item);
        $data = [];
        foreach ($item as $i) {
            $data[] = [
                'item' => $i->name,
                'price' => $i->price,
                'user_id' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        $new = session('guestCart', $data);
        dd($new);
        // $data = session('guestCart');
        // dd($data);
        // dd($data[0]['item']);
    }

    public function showCart()
    {
        return view('cart');
    }
}
