<?php

namespace App\Http\Controllers;

use App\CsvData;
use Illuminate\Http\Request;

class CsvDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('csvdata.index');
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
     * @param  \App\CsvData  $csvData
     * @return \Illuminate\Http\Response
     */
    public function show(CsvData $csvData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CsvData  $csvData
     * @return \Illuminate\Http\Response
     */
    public function edit(CsvData $csvData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CsvData  $csvData
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CsvData $csvData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CsvData  $csvData
     * @return \Illuminate\Http\Response
     */
    public function destroy(CsvData $csvData)
    {
        //
    }
}
