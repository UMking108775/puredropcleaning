@php
    use App\Models\Setting;
    
    $wcuSettings = Setting::getGroup('why_choose_us');
    $wcuEnabled = $wcuSettings['wcu_enabled'] ?? '1';
    $wcuStyle = $wcuSettings['wcu_style'] ?? 'style1';
    
    $wcu = [
        'badge' => $wcuSettings['wcu_badge'] ?? 'Why Choose Us',
        'heading' => $wcuSettings['wcu_heading'] ?? 'We Make Your Space <span class="text-primary">Shine Bright</span>',
        'subtitle' => $wcuSettings['wcu_subtitle'] ?? 'With years of experience in the cleaning industry, we understand what it takes to deliver exceptional results.',
        'features' => [
            [
                'title' => $wcuSettings['wcu_feature1_title'] ?? 'Trained Cleaning Professionals',
                'desc' => $wcuSettings['wcu_feature1_desc'] ?? 'Directly employed, uniformed and trained staff.',
                'icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
            ],
            [
                'title' => $wcuSettings['wcu_feature2_title'] ?? 'Professional Cleaning Materials',
                'desc' => $wcuSettings['wcu_feature2_desc'] ?? 'Commercial-grade equipment and quality cleaning solutions.',
                'icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z',
            ],
            [
                'title' => $wcuSettings['wcu_feature3_title'] ?? 'Flexible Scheduling',
                'desc' => $wcuSettings['wcu_feature3_desc'] ?? 'Convenient morning, afternoon and recurring slots across Dubai.',
                'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
            ],
            [
                'title' => $wcuSettings['wcu_feature4_title'] ?? 'Customer Satisfaction Focused',
                'desc' => $wcuSettings['wcu_feature4_desc'] ?? 'Attentive supervision and thorough inspection upon job completion.',
                'icon' => 'M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5',
            ],
        ],
        'stats' => [
            ['value' => $wcuSettings['wcu_stat1_value'] ?? '100%', 'label' => $wcuSettings['wcu_stat1_label'] ?? 'Directly Employed'],
            ['value' => $wcuSettings['wcu_stat2_value'] ?? '7 Days', 'label' => $wcuSettings['wcu_stat2_label'] ?? 'Weekly Availability'],
            ['value' => $wcuSettings['wcu_stat3_value'] ?? '30+', 'label' => $wcuSettings['wcu_stat3_label'] ?? 'Dubai Communities'],
            ['value' => $wcuSettings['wcu_stat4_value'] ?? '5.0★', 'label' => $wcuSettings['wcu_stat4_label'] ?? 'Google Rating'],
        ],
    ];
@endphp

@if($wcuEnabled !== '0' && $wcuEnabled !== false && $wcuEnabled !== 'false')
@if($wcuStyle === 'style2')
    @include('partials.wcu-styles.style2', ['wcu' => $wcu])
@elseif($wcuStyle === 'style3')
    @include('partials.wcu-styles.style3', ['wcu' => $wcu])
@else
    @include('partials.wcu-styles.style1', ['wcu' => $wcu])
@endif

<!-- On-Scroll Number Counting Animation -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('[data-wcu-counter]');
        if (!counters.length) return;

        const observer = new IntersectionObserver(function(entries, obs) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const rawValue = (el.getAttribute('data-wcu-counter') || el.innerText || '').trim();
                    
                    // Match prefix, number, and suffix (e.g., "5000+", "98%", "10+", "AED 500+")
                    const match = rawValue.match(/^([^\d]*)([\d,]+)(\.?\d*)(.*)$/);
                    if (match) {
                        const prefix = match[1] || '';
                        const targetNum = parseFloat(match[2].replace(/,/g, '') + (match[3] || ''));
                        const suffix = match[4] || '';
                        const duration = 1600; // ms
                        const startTime = performance.now();

                        function step(now) {
                            const elapsed = now - startTime;
                            const progress = Math.min(elapsed / duration, 1);
                            // Ease-out cubic curve: fast start, soft finish
                            const ease = 1 - Math.pow(1 - progress, 3);
                            const current = Math.floor(ease * targetNum);
                            const formatted = targetNum >= 1000 ? current.toLocaleString() : current;
                            el.textContent = prefix + formatted + suffix;

                            if (progress < 1) {
                                requestAnimationFrame(step);
                            } else {
                                const finalFormatted = targetNum >= 1000 ? targetNum.toLocaleString() : targetNum;
                                el.textContent = prefix + finalFormatted + suffix;
                            }
                        }

                        requestAnimationFrame(step);
                    }
                    obs.unobserve(el);
                }
            });
        }, {
            threshold: 0.2,
            rootMargin: '0px 0px -40px 0px'
        });

        counters.forEach(function(el) {
            observer.observe(el);
        });
    });
</script>
@endif
