<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SalesTransaction;
use App\Order;
use App\Product;
use App\Admin;
use \Auth;
use \DB;

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
        $trans = SalesTransaction::orderBy('created_at', 'desc')->paginate(5);
        $totalSales = '₱'. number_format(SalesTransaction::trackTotalSales(), 2);
        $totalTrans = SalesTransaction::trackTotalTransactions();
        $totalProds = SalesTransaction::trackTotalProducts();
        return view('admin')->with([
            'trans' => $trans,
            'totalSales' => $totalSales,
            'totalTrans' => $totalTrans,
            'totalProds' => $totalProds
        ]);
    }

    public function orderFeedback($order_id)
    {
        $data = SalesTransaction::where('order_code', $order_id);

        $transSms = $data->get();
        return view('orderFeedback')->with('transSms', $transSms);
    }

    public function submitOrderFeedBack(Request $req, $order_code)
    {
        $this->validate($req, [
            'sms' => 'required|string'
        ]);

        $feedbackOrder = SalesTransaction::where('order_code', $order_code)->get();
        $data = new Order;
        $data->sales_transaction_id = $feedbackOrder[0]['id'];
        $data->user_id = $feedbackOrder[0]['user_id'];
        $data->message = $req->input('sms');

        if ( $data->save() ) {
            DB::table('sales_transactions')
            ->where('order_code', $order_code)
            ->update(['order_status_id' => 2]);

            return redirect()->route('admin.dashboard')->with('acceptOrderSuccess', 'The order you selected has been approved and will be ready to be claim by its customer.');
        } else {
            return redirect()->back()->with('acceptOrderError', 'Something went wrong, please try again.');
        }
    }

    public function showReports()
    {
        $sort = SalesTransaction::all();
        return view('reports')->with('sort', $sort);
    }
}
