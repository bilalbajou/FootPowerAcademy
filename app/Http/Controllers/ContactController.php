<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * Handle contact form submission.
     */
    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'phone' => 'nullable|string|max:30',
            'email' => 'required|email|max:100',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:2000',
        ]);

        if ($validator->fails()) {
            // For Inertia.js, redirect back with errors
            return redirect()->back()->withErrors($validator->errors());
        }

        // Send email to admin
        try {
            Mail::send('emails.contact', [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ], function ($message) use ($request) {
                $message->to(config('mail.from.address'))
                    ->subject('[Contact] ' . $request->input('subject'))
                    ->replyTo($request->input('email'), $request->input('name'));
            });
        } catch (\Exception $e) {
            Log::error('Contact form email failed: ' . $e->getMessage());

            // Return with a general error
            return redirect()->back()->withErrors([
                'general' => 'Failed to send email. Please try again later.'
            ]);
        }

        // Success - redirect back (Inertia will handle this properly)
        return redirect()->back();
    }
}
