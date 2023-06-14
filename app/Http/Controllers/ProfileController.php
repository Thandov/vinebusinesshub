<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            // Add more fields to validate if needed
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Update the user's profile information
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        // Update other fields if needed

        $user->save();

        // Redirect or return a response
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function destroy()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Delete the user's profile
        $user->delete();

        // Perform any additional cleanup or logout if needed

        // Redirect or return a response
        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}
