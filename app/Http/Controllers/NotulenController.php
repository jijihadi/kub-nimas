<?php

namespace App\Http\Controllers;

use App\Models\Notulen;
use App\Http\Requests\StoreNotulenRequest;
use App\Http\Requests\UpdateNotulenRequest;

class NotulenController extends Controller
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
     * @param  \App\Http\Requests\StoreNotulenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotulenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function show(Notulen $notulen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function edit(Notulen $notulen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotulenRequest  $request
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotulenRequest $request, Notulen $notulen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notulen  $notulen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notulen $notulen)
    {
        //
    }
}
