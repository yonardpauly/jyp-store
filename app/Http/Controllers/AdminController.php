<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ SalesTransaction, Order, Product, Admin, OrderedItem };
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

        $ordered_items = OrderedItem::where('sales_transaction_id', $feedbackOrder[0]['id'])->get();
        $ordered_qty = $ordered_items[0]['quantity'];

        if ($data->save()) {

            DB::table('sales_transactions')
            ->where('order_code', $order_code)
            ->update(['order_status_id' => 2]);

            for ($i = 0; $i < count($feedbackOrder); $i++) {
                DB::table('products')->where('name', $ordered_items[0]['item'])
                ->decrement('quantity', $ordered_items[0]['quantity']);
            }

            return redirect()->route('admin.dashboard')->with('acceptOrderSuccess', 'The order you selected has been approved and will be ready to be claim by its customer.');
        } else {
            return redirect()->back()->with('acceptOrderError', 'Something went wrong, please try again.');
        }
    }

    public function showReports()
    {
        $sort = SalesTransaction::all();
        $reports = SalesTransaction::select([
            'transaction_date','order_status_id','order_code','sold_quantity','total_amount'
        ])->orderBy('created_at', 'desc')->paginate(10);
        $totalSales = '₱'. number_format(SalesTransaction::trackTotalSales(), 2);
        $totalTrans = SalesTransaction::trackTotalTransactions();
        $totalProds = SalesTransaction::trackTotalProducts();
        return view('reports')->with([
            'reports' => $reports,
            'totalSales' => $totalSales,
            'totalTrans' => $totalTrans,
            'totalProds' => $totalProds
        ]);
    }

    public function showRejectedFeedback($order_id)
    {
        $data = SalesTransaction::where('order_code', $order_id);

        $transSms = $data->get();
        return view('rejected')->with('transSms', $transSms);
    }

    public function submitRejectedFeedback(Request $req, $order_id)
    {
        $this->validate($req, [
            'sms' => 'required|string'
        ]);

        $feedbackOrder = SalesTransaction::where('order_code', $order_id)->get();

        $data = new Order;
        $data->sales_transaction_id = $feedbackOrder[0]['id'];
        $data->user_id = $feedbackOrder[0]['user_id'];
        $data->message = $req->input('sms');
        // dd($data);

        if ($data->save()) {

            DB::table('sales_transactions')
            ->where('order_code', $order_id)
            ->update(['order_status_id' => 3]);

            return redirect()->route('admin.dashboard')->with('acceptOrderSuccess', 'The order you selected has been approved and will be ready to be claim by its customer.');
        } else {
            return redirect()->back()->with('acceptOrderError', 'Something went wrong, please try again.');
        }
    }
}
