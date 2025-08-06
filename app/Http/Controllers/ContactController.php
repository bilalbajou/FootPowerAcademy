<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
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

        // Store contact in database
        try {
            $data = [
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'subject' => $request->input('subject'),
                'message' => $request->input('message'),
            ];

            \App\Models\ContactMessage::create($data);

            // Send confirmation email to visitor
            Mail::to($data['email'])->send(new \App\Mail\ContactConfirmationMail($data));

            // Send notification email to owner
            $ownerEmail = config('mail.from.address', 'admin@footpoweracademy.com');
            Mail::to($ownerEmail)->send(new \App\Mail\ContactNotificationMail($data));

            // Success - redirect back with success message
            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            Log::error('Contact form DB save failed: ' . $e->getMessage());
            return redirect()->back()->withErrors([
                'general' => 'Failed to submit your message. Please try again later.'
            ]);
        }
    }
}
