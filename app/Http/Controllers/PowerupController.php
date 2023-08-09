<?php

namespace App\Http\Controllers;

use App\Models\powerup;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;


class PowerupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($powerup)
    {
        $urlSegments = explode('/', request()->path());

        if ($powerup === 'accounting') {
            return view('business.viewbusiness.powerups._accounting', compact('urlSegments'));
        } elseif ($powerup === 'business') {
            return view('business.viewbusiness.powerups._business', compact('urlSegments'));
        } elseif ($powerup === 'company') {
            return view('business.viewbusiness.powerups._company', compact('urlSegments'));
        } elseif ($powerup === 'marketplace') {
            return view('business.viewbusiness.powerups._marketplace', compact('urlSegments'));
        } elseif ($powerup === 'invoices') {
            return view('business.viewbusiness.powerups._invoices', compact('urlSegments'));
        } elseif ($powerup === 'quotations') {
            return view('business.viewbusiness.powerups._quotations', compact('urlSegments'));
        } elseif ($powerup === 'transaction') {
            return view('business.viewbusiness.powerups._transaction', compact('urlSegments'));
        } elseif ($powerup === 'tax') {
            return view('business.viewbusiness.powerups._tax', compact('urlSegments'));
        } else {
            // Handle the case where $powerup doesn't match any of the expected values
            // For example, you might want to return a default view or show an error message.
        }
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
    public function activatepowerup(Request $request)
    {
        dd($request->input());
        // Get user ID and powerup ID from the request
        $powerupId = $request->input('powerid'); // Make sure you have the correct input name

        // Find the user's powerup
        $powerup = Powerup::find($powerupId);

        if (!$powerup) {
            return redirect()->back()->with('error', 'Powerup not found.');
        }

        // Check if the powerup is already active
        if ($powerup->is_active) {
            return redirect()->back()->with('error', 'Powerup is already active.');
        }

        // Update the powerup record
        $powerup->is_active = true;
        $powerup->activation_date = Carbon::now();
        $powerup->save();

        return redirect()->back()->with('success', 'Powerup activated successfully.');
    }

}
