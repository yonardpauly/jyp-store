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
        $admins = Admin::setAdminInfo(Auth::user()->name);
        $trans = SalesTransaction::orderBy('created_at', 'desc')->paginate(5);
        $totalSales = '₱'. number_format(SalesTransaction::trackTotalSales(), 2);
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

        $transSms = $data->get();
        return view('orderFeedback')->with('transSms', $transSms);
    }

    public function submitOrderFeedBack(Request $req, $order_code)
    {
        $this->validate($req, [
            'sms' => 'required|string'
        ]);

        // $prodId = SalesTransaction::select('items')->get();

        // $aaa = [];
        // foreach ($prodId as $key => $value) {
        //     $aaa[] = explode('[{', $prodId);
        // }
        // $aaaNew = [];
        // foreach ($aaa as $key => $value) {
        //     $aaaNew[] = $aaa[$key][2];
        // }
        // $stripped = [];
        // foreach ($aaaNew as $key => $value) {
        //     $stripped[] = rtrim($aaaNew[$key], ',');
        // }

        // $aaaNew2 = [];
        // foreach ($stripped as $key => $value) {
        //     $aaaNew2[] = explode('~', $stripped[$key]);
        // }

        $feedbackOrder = SalesTransaction::where('order_code', $order_code)->get();

        // dd($feedbackOrder[0]);
        $data = new Order;
        $data->sales_transaction_id = $feedbackOrder[0]['id'];
        $data->user_id = $feedbackOrder[0]['user_id'];
        $data->message = $req->input('sms');
        // dd($data);
        if ( $data->save() ) {
            // for ( $i = 0; $i <= count($aaaNew2); $i++ ) {
            //     DB::table('products')->where('slug', 'like', '%'. $aaaNew2[0][0] .'%')
            //     ->decrement(['quantity' => $aaaNew2[0][2]]);
            // }
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
        return view('reports');
    }

    public function showFilteredReportDate(Request $req, $date = null)
    {
        $date = $req->input('sortDate');
        $sort = SalesTransaction::setFilteredReportByDate($date);
        return view('reports')->with('sort', $sort);
    }
}