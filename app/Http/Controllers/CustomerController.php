<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use \Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::showCustomers();
        return view('customers.index')->with([
            'customers' => $customers,
        ]);
    }
}
