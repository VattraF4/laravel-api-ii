<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendWelcomeEmail()
    {
        $name = auth()->user()->name;
        $email = auth()->user()->email;

        // Send the welcome email
        Mail::to($email)->send(new WelcomeMail($name));
        return response()->json(['message' => 'Welcome email sent successfully.']);
    }
}
