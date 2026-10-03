@php
    $brandPhone = \App\Models\Setting::get('brand_phone', '+971 56 217 0386');
    $cleanPhone = preg_replace('/[^0-9+]/', '', $brandPhone);
    $waDigits = preg_replace('/[^0-9]/', '', $cleanPhone);
    $brandName = \App\Models\Setting::get('brand_name', 'PureDropCleaning');
    $defaultMsg = urlencode("Hello {$brandName}, I would like to inquire about your cleaning services in Dubai.");
    $whatsappUrl = \App\Models\Setting::get('social_whatsapp', 'https://api.whatsapp.com/send?phone=' . ($waDigits ?: '971562170386') . '&text=' . $defaultMsg);
    if (!str_starts_with($whatsappUrl, 'http')) {
        $whatsappUrl = 'https://api.whatsapp.com/send?phone=' . preg_replace('/[^0-9]/', '', $whatsappUrl) . '&text=' . $defaultMsg;
    }
@endphp

<!-- Modern Floating Mobile Action Dock -->
<nav id="mobile-sticky-action-bar" 
     class="fixed bottom-3 inset-x-3 max-w-md mx-auto z-40 md:hidden transition-all duration-300"
     aria-label="Quick mobile actions">
    <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-[0_10px_35px_rgba(0,0,0,0.15)] border border-gray-100 p-2 flex items-center gap-2 ring-1 ring-black/5">
        <!-- Direct Phone Call Button -->
        <a href="tel:{{ $cleanPhone }}" 
           class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 text-primary flex items-center justify-center transition-all flex-shrink-0 active:scale-95"
           aria-label="Call {{ $brandPhone }}">
            <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </a>

        <!-- High-Converting WhatsApp Action -->
        <a href="{{ $whatsappUrl }}" 
           target="_blank" 
           rel="noopener noreferrer" 
           class="flex-1 h-12 rounded-xl bg-[#25D366] hover:bg-[#20ba5a] text-white font-bold text-[13px] flex items-center justify-center gap-2 shadow-md shadow-green-500/25 active:scale-95 transition-all"
           aria-label="Chat with PureDrop on WhatsApp">
            <img src="{{ asset('icons8-whatsapp-48.png') }}" alt="WhatsApp" class="w-5 h-5 object-contain">
            <span class="tracking-tight">WhatsApp Us</span>
        </a>

        <!-- Instant Quote Button -->
        <a href="{{ route('contact') }}" 
           class="h-12 px-4 rounded-xl bg-primary hover:bg-primary-dark text-white font-bold text-xs flex items-center justify-center whitespace-nowrap active:scale-95 transition-all shadow-md shadow-primary/20"
           aria-label="Get a Free Instant Quote">
            <span>Get Quote</span>
        </a>
    </div>
</nav>
