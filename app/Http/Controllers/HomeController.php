<?php

namespace App\Http\Controllers;

use App\Order;
use \Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $orders = Order::where('user_id', Auth::user()->id)->get();
        $orders = Order::orderBy('created_at', 'desc')->get();
        
        // dd($orders);
        return view('/home')->with('orders', $orders);
    }
}
