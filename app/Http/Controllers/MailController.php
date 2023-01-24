<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;


class MailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $details = [
            'title' => 'Mail from The Vine SA',
            'body' => 'Welcome to the Vine Family'
        ];

        Mail::to($request->email)->send(new TestMail($details));
        
        return redirect()->back();
    }
}