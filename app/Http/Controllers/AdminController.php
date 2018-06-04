<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesTransaction;
use App\Admin;
use \Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::setAdminInfo(Auth::user()->name);
        $trans = SalesTransaction::orderBy('created_at', 'desc')->paginate(5);
        $totalSales = money_format( '₱%i', SalesTransaction::trackTotalSales() );
        $totalTrans = SalesTransaction::trackTotalTransactions();
        $totalProds = SalesTransaction::trackTotalProducts();
        $data = [];
        foreach ($admins as $admin) {
            $data[] = $admin;
        }
        // dd($data[0]->name);
        return view('admin')->with([
            'name' => $data[0]->name,
            'email' => $data[0]->email,
            'trans' => $trans,
            'totalSales' => $totalSales,
            'totalTrans' => $totalTrans,
            'totalProds' => $totalProds
        ]);
    }

    public function orderFeedback($order_id)
    {
        $data = SalesTransaction::where('order_code', $order_id);
        // dd($transSms[0]['order_code']);

        // if ($transSms[0]['order_code'] !== $order_id) {
        //     abort(404);
        // }

        $transSms = $data->get();
        return view('orderFeedback')->with('transSms', $transSms);
    }
}