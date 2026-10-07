<?php

namespace App\Http\Controllers;

use App\Models\QuoteRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Validate captcha first
        $captchaAnswer = $request->input('captcha_answer');
        $captchaHash = $request->input('captcha_hash');

        if (!$captchaAnswer || !$captchaHash || $this->simpleHash('captcha_' . $captchaAnswer . '_puredrop') !== $captchaHash) {
            return back()->withInput()->withErrors(['captcha_answer' => 'Incorrect answer. Please try again.']);
        }

        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'phone'           => 'required|string|max:50',
            'email'           => 'nullable|email|max:255',
            'area'            => 'nullable|string|max:255',
            'service_id'      => 'nullable|exists:services,id',
            'property_type'   => 'nullable|string|max:100',
            'bedrooms'        => 'nullable|string|max:100',
            'preferred_date'  => 'nullable|string|max:50',
            'preferred_time'  => 'nullable|string|max:100',
            'materials'       => 'nullable|string|max:100',
            'notes'           => 'nullable|string|max:3000',
            'message'         => 'nullable|string|max:3000',
            'attachment'      => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,pdf|max:25600',
        ]);

        // If email is not given, provide a default contact email placeholder
        if (empty($validated['email'])) {
            $validated['email'] = 'customer-' . preg_replace('/[^0-9]/', '', $validated['phone']) . '@puredropcleaning.com';
        }

        // Handle Deep Cleaning Photo/Video Upload
        if ($request->hasFile('attachment') && $request->file('attachment')->isValid()) {
            $path = $request->file('attachment')->store('quote-attachments', 'public');
            $validated['attachment_path'] = $path;
        }

        // Harmonize message / notes
        if (empty($validated['message'])) {
            $validated['message'] = $validated['notes'] ?? 'Quote request submitted via online booking form.';
        }

        unset($validated['attachment']);

        QuoteRequest::create($validated);

        return redirect()->route('contact')
            ->with('success', 'Thank you! Your quotation request has been received. Our team will review your details and contact you promptly via WhatsApp or Phone.');
    }

    /**
     * Simple hash function matching the client-side JavaScript version.
     */
    private function simpleHash(string $str): string
    {
        $hash = 0;
        for ($i = 0; $i < strlen($str); $i++) {
            $char = ord($str[$i]);
            $hash = (($hash << 5) - $hash) + $char;
            $hash = $hash & 0xFFFFFFFF; // Keep as 32-bit integer
            if ($hash > 0x7FFFFFFF) {
                $hash -= 0x100000000; // Convert to signed 32-bit
            }
        }
        return (string) abs($hash);
    }
}
