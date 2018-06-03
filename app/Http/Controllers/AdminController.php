<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $data = [];
        foreach ($admins as $admin) {
            $data[] = $admin;
        }
        // dd($data[0]->name);
        return view('admin')->with([
            'name' => $data[0]->name,
            'email' => $data[0]->email
        ]);
    }
}