<?php

namespace App\Http\Controllers;

use App\{ User, Admin, SalesTransaction };
use \Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
    	$totalSales = '₱'. number_format(SalesTransaction::trackTotalSales(), 2);
        $totalTrans = SalesTransaction::trackTotalTransactions();
        $totalProds = SalesTransaction::trackTotalProducts();
        $customers = User::showCustomers();
        return view('customers.index')->with([
            'customers' => $customers,
            'totalSales' => $totalSales,
            'totalTrans' => $totalTrans,
            'totalProds' => $totalProds
        ]);
    }
}
