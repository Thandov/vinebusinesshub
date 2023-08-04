<?php

namespace App\Http\Controllers;

use App\Models\powerup;
use Illuminate\Http\Request;

class PowerupController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\powerup  $powerup
     * @return \Illuminate\Http\Response
     */
    public function show(powerup $powerup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\powerup  $powerup
     * @return \Illuminate\Http\Response
     */
    public function edit(powerup $powerup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\powerup  $powerup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, powerup $powerup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\powerup  $powerup
     * @return \Illuminate\Http\Response
     */
    public function destroy(powerup $powerup)
    {
        //
    }
    public function taxRequest(Request $request)
    {
        dd($request->input());
    }
}
