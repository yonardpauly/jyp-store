<?php

namespace App\Http\Controllers;

use App\SalesTransaction;
use Illuminate\Http\Request;

class SalesTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // dd($trans);
        return view('admin.sales');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SalesTransaction  $salesTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(SalesTransaction $salesTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SalesTransaction  $salesTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(SalesTransaction $salesTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SalesTransaction  $salesTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalesTransaction $salesTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SalesTransaction  $salesTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalesTransaction $salesTransaction)
    {
        //
    }
}
