<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'service_id' => 'nullable|exists:services,id',
            'message' => 'required|string|min:10',
        ]);

        QuoteRequest::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message! We will get back to you shortly.');
    }
}
