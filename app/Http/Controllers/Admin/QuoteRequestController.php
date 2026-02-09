<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuoteRequest;
use App\Mail\QuoteResponseMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class QuoteRequestController extends Controller
{
    public function index(Request $request)
    {
        $query = QuoteRequest::with('service')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $quotes = $query->paginate(15);
        
        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(QuoteRequest $quote)
    {
        $quote->load('service');
        return view('admin.quotes.show', compact('quote'));
    }

    public function respond(Request $request, QuoteRequest $quote)
    {
        $validated = $request->validate([
            'admin_response' => 'required|string|min:10',
        ]);

        // Mark as responded
        $quote->markAsResponded($validated['admin_response']);

        // Send email to customer
        try {
            Mail::to($quote->email)->send(new QuoteResponseMail($quote));
        } catch (\Exception $e) {
            return redirect()->route('admin.quotes.show', $quote)
                ->with('warning', 'Response saved but email could not be sent: ' . $e->getMessage());
        }

        return redirect()->route('admin.quotes.index')
            ->with('success', 'Response sent successfully!');
    }

    public function close(QuoteRequest $quote)
    {
        $quote->update(['status' => 'closed']);

        return redirect()->route('admin.quotes.index')
            ->with('success', 'Quote request closed.');
    }

    public function destroy(QuoteRequest $quote)
    {
        $quote->delete();

        return redirect()->route('admin.quotes.index')
            ->with('success', 'Quote request deleted.');
    }
}
