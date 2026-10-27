<?php

namespace App\Http\Controllers;

use App\Mail\contactUsForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required', 'string', 'max:100'],
            'last_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        Mail::to(config('mail.from.address'))
            ->send(new contactUsForm($data));

        return back()->with(
            'success',
            'Your message has been sent successfully!'
        );
    }
}
