@php
    $alignClass = match($align ?? 'center') {
        'left' => 'justify-start',
        'right' => 'justify-end',
        default => 'justify-center',
    };
@endphp
<!-- Custom CNC Laser-Cut Style Decorative Heading Divider -->
<div class="flex items-center {{ $alignClass }} gap-2 sm:gap-2.5 my-3 sm:my-3.5 select-none" aria-hidden="true">
    <span class="h-[2px] w-10 sm:w-16 bg-gradient-to-r from-transparent via-primary/30 to-primary rounded-full"></span>
    <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-accent flex-shrink-0" viewBox="0 0 24 24" fill="currentColor">
        <!-- CNC Geometric Diamond Motif -->
        <path d="M12 2L14.8 9.2L22 12L14.8 14.8L12 22L9.2 14.8L2 12L9.2 9.2L12 2Z"/>
    </svg>
    <span class="h-[2px] w-10 sm:w-16 bg-gradient-to-l from-transparent via-primary/30 to-primary rounded-full"></span>
</div>

