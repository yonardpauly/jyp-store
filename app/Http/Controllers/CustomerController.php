<?php

namespace App\Http\Controllers;

use App\User;
use App\Admin;
use \Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::showCustomers();
        $admins = Admin::setAdminInfo(Auth::user()->name);
        $data = [];
        foreach ($admins as $admin) {
            $data[] = $admin;
        }
        // dd($customers);
        return view('customers.index')->with([
            'customers' => $customers,
            'name' => $data[0]->name,
            'email' => $data[0]->email
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
