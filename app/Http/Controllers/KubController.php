<?php

namespace App\Http\Controllers;

use App\Models\Kub;
use App\Http\Requests\StoreKubRequest;
use App\Http\Requests\UpdateKubRequest;

class KubController extends Controller
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
     * @param  \App\Http\Requests\StoreKubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreKubRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function show(Kub $kub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function edit(Kub $kub)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKubRequest  $request
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKubRequest $request, Kub $kub)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kub  $kub
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kub $kub)
    {
        //
    }
}
