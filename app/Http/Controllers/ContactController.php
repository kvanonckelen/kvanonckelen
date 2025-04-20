<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'type'    => 'required|string',
            'message' => 'required|string',
        ]);

        // You can change this to send it to your own email address
        Mail::raw(
            "New contact form message:\n\n" .
            "Name: {$validated['name']}\n" .
            "Email: {$validated['email']}\n" .
            "Type: {$validated['type']}\n" .
            "Message:\n{$validated['message']}",
            function ($message) {
                $message->to('kevin@volt-it.be')
                        ->subject('New Contact Form Submission');
            }
        );

        return redirect()->back()->with('success', 'Thanks for reaching out! I’ll get back to you soon.');
    }
}
