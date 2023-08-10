<?php

namespace App\Http\Controllers;

use App\Models\Powerup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


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
    public function activatepowerup(Request $request)
    {
        $userId = $request->input('user_id');
        $powerupId = $request->input('powerup_id');

        // Find the user's powerup
        $powerup = Powerup::find($powerupId);

        if (!$powerup) {
            Alert::error('Error', 'Powerup not found.');
            return redirect()->back();
        }

        // Check if the powerup is already active
        if ($powerup->is_active) {
            Alert::warning('Warning', 'Powerup is already active.');
            return redirect()->back();
        }

        // Update the powerup record
        $powerup->is_active = true;
        $powerup->activation_date = Carbon::now();
        $powerup->save();

        Alert::success('Success', 'Powerup activated successfully.');
        return redirect()->back();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\powerup  $powerup
     * @return \Illuminate\Http\Response
     */
    public function accountingRequest(Powerup $powerup, Request $request)
    {
        dd($request->input());
    }
    public function taxRequest(Request $request)
    {
        dd($request->input());
    }
}
