<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UserPowerupsController; // Import the UserPowerupsController class

use App\Models\Powerup;
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
        // Create an instance of UserPowerupsController
        $userPowerupsController = new UserPowerupsController();

        
        $urlSegments = explode('/', request()->path());

        $powerid = Powerup::select('powerid')->where('slug', $powerup)->first();
        $actstatus = $userPowerupsController->activestatus($powerid->powerid);
        return view('business.viewbusiness.powerups._powerup', compact('urlSegments', 'powerup', 'powerid', 'actstatus'));
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
