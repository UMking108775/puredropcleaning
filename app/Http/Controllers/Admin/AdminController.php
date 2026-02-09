<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\QuoteRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::active()->count(),
            'pending_quotes' => QuoteRequest::pending()->count(),
            'total_quotes' => QuoteRequest::count(),
        ];

        $recentQuotes = QuoteRequest::with('service')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentQuotes'));
    }
}
