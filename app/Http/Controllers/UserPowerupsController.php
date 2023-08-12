<?php

namespace App\Http\Controllers;

use App\Models\userPowerups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserPowerupsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userPowerups  $userPowerups
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\userPowerups  $userPowerups
     * @return \Illuminate\Http\Response
     */
    public function activestatus($powerid)
    {
        $activestatus = userPowerups::select('is_active')->where('powerup_id', $powerid)->first();
        return $activestatus ? $activestatus->is_active : false;

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\userPowerups  $userPowerups
     * @return \Illuminate\Http\Response
     */
    public function edit(userPowerups $userPowerups)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\userPowerups  $userPowerups
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, userPowerups $userPowerups)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\userPowerups  $userPowerups
     * @return \Illuminate\Http\Response
     */
    public function destroy(userPowerups $userPowerups)
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
        $powerupId = $request->input('powerid');
        $loggedInUserId = Auth::id(); // Get the currently logged-in user's ID

        // Find the user's powerup
        $userPowerup = UserPowerups::where('user_id', $loggedInUserId)
            ->where('powerup_id', $powerupId)
            ->first();

        if (!$userPowerup) {
            // If the user_powerup record does not exist, create it
            $userPowerup = new UserPowerups();
            $userPowerup->user_id = $loggedInUserId;
            $userPowerup->powerup_id = $powerupId;
            $userPowerup->is_active = true;
            $userPowerup->activation_date = now();
            $userPowerup->save();

            return redirect()->back()->with('message', [
                'type' => 'success',
                'text' => 'Powerup activated successfully.'
            ]);
        } else {
            // Check if the powerup is already active
            if ($userPowerup->is_active) {
                return redirect()->back()->with('message', [
                    'type' => 'warning',
                    'text' => 'Powerup is already active.'
                ]);
            }

            // Update the user_powerups record
            $userPowerup->is_active = true;
            $userPowerup->activation_date = now();
            $userPowerup->save();

            return redirect()->back()->with('message', [
                'type' => 'success',
                'text' => 'Powerup activated successfully.'
            ]);
        }
    }
    public function deactivatepowerup(Request $request)
    {
        $powerupId = $request->input('powerid');
        $loggedInUserId = Auth::id(); // Get the currently logged-in user's ID

        // Find the user's powerup
        $userPowerup = UserPowerups::where('user_id', $loggedInUserId)
            ->where('powerup_id', $powerupId)
            ->first();

        if (!$userPowerup) {
            return redirect()->back()->with('message', [
                'type' => 'error',
                'text' => 'Powerup not found for the current user.'
            ]);
        }

        // Check if the powerup is already deactivated
        if (!$userPowerup->is_active) {
            return redirect()->back()->with('message', [
                'type' => 'warning',
                'text' => 'Powerup is already deactivated.'
            ]);
        }

        // Update the user_powerups record to deactivate
        $userPowerup->is_active = false;
        $userPowerup->deactivation_date = now(); // Set the deactivation date
        $userPowerup->save();

        return redirect()->back()->with('message', [
            'type' => 'success',
            'text' => 'Powerup deactivated successfully.'
        ]);
    }

}
