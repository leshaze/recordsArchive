<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePriceHistoryRequest;
use App\Http\Requests\UpdatePriceHistoryRequest;
use App\Models\PriceHistory;

class PriceHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StorePriceHistoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePriceHistoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PriceHistory  $priceHistory
     * @return \Illuminate\Http\Response
     */
    public function show(PriceHistory $priceHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PriceHistory  $priceHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(PriceHistory $priceHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePriceHistoryRequest  $request
     * @param  \App\Models\PriceHistory  $priceHistory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePriceHistoryRequest $request, PriceHistory $priceHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PriceHistory  $priceHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(PriceHistory $priceHistory)
    {
        //
    }
}
