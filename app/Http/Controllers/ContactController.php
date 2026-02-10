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
