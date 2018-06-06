<?php

namespace App\Http\Controllers;

use App\{ Order, SalesTransaction };
use \Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')->get();

        $trans = SalesTransaction::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')->get();

        return view('/home')->with([
            'orders' => $orders,
            'trans' => $trans
        ]);
    }

    public function showItems($items)
    {
        $items = SalesTransaction::where('items', $items)->get();
        // dd($items);
        return view('items')->with('items', $items);
    }
}
