<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        // Retrieve the authenticated user
        $user = Auth::user();

        // Check if any updates are made
        $updatesMade = false;

        // Update the user's profile information
        if ($user->name !== $validatedData['name']) {
            $user->name = $validatedData['name'];
            $updatesMade = true;
        }

        if ($user->email !== $validatedData['email']) {
            $user->email = $validatedData['email'];
            $updatesMade = true;
        }

        // Update the password if a new one is provided
        if ($validatedData['new_password']) {
            $user->password = Hash::make($validatedData['new_password']);
            $updatesMade = true;
        }

        // Save the changes
        $user->save();

        // Redirect or return a response with appropriate message
        if ($updatesMade) {
            return redirect()->back()->with('success', 'Profile updated successfully.');
        } elseif ($request->filled('new_password')) {
            return redirect()->back()->withErrors(['new_password' => 'The new password must be at least 8 characters and match the confirmation.'])->withInput();
        } else {
            return redirect()->back()->with('info', 'No updates made to profile.');
        }
    }

    public function destroy()
    {
        // Retrieve the authenticated user
        $user = Auth::user();

        // Delete the user's profile
        $user->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully.');
    }
}