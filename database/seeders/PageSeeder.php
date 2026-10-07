<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // The about page is rendered from the styled Blade view directly.
        Page::whereIn('slug', ['about-us', 'about'])->update([
            'is_active'      => false,
            'show_in_header' => false,
            'show_in_footer' => false,
        ]);

        $policies = [
            [
                'slug' => 'privacy-policy',
                'title' => 'Privacy Policy',
                'meta_description' => 'Pure Drop Building Cleaning Services LLC Privacy Policy - Learn how we collect, use, and protect your personal information.',
                'content' => '
                    <div class="prose max-w-none text-gray-700 space-y-6">
                        <p class="text-sm text-gray-500">Last updated: October 2026</p>
                        
                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">1. Introduction</h2>
                        <p>Welcome to Pure Drop Building Cleaning Services LLC ("we", "our", or "us"). We provide residential and commercial cleaning services across Dubai and the UAE. We are committed to safeguarding your privacy and ensuring your personal information is handled safely and responsibly.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">2. Information We Collect</h2>
                        <p>When you request a quote, book a cleaning appointment, or contact us through our website, phone, or WhatsApp, we may collect:</p>
                        <ul class="list-disc pl-6 space-y-1">
                            <li><strong>Contact details:</strong> Name, phone number, email address, and WhatsApp contact details.</li>
                            <li><strong>Service location:</strong> Physical address, building/villa name, apartment number, and community in Dubai.</li>
                            <li><strong>Booking preferences:</strong> Service type, property size, preferred appointment schedule, and any special cleaning instructions.</li>
                            <li><strong>Technical data:</strong> IP address, browser type, device information, and browsing behaviour collected via cookies.</li>
                        </ul>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">3. How We Use Your Information</h2>
                        <p>We use your information to:</p>
                        <ul class="list-disc pl-6 space-y-1">
                            <li>Process and confirm your cleaning bookings and quote requests.</li>
                            <li>Dispatch our cleaning team to your exact location safely and on time.</li>
                            <li>Communicate booking confirmations, reminders, and service updates via WhatsApp, SMS, or email.</li>
                            <li>Enhance our customer service, quality assurance, and satisfaction follow-ups.</li>
                            <li>Comply with applicable UAE laws and regulations.</li>
                        </ul>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">4. Data Sharing & Security</h2>
                        <p>We do not sell, rent, or trade your personal information to third parties. We may only share necessary operational details with authorized cleaning personnel strictly for performing the scheduled service. We employ robust security measures to protect your data against unauthorized access, alteration, or disclosure.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">5. Your Rights</h2>
                        <p>You have the right to request access to the personal data we hold about you, request corrections, or ask us to delete your personal details. To exercise these rights, please contact our support team at info.puredropcleaning@gmail.com.</p>
                    </div>
                ',
                'is_active' => true,
                'show_in_header' => false,
                'show_in_footer' => true,
            ],
            [
                'slug' => 'terms-of-service',
                'title' => 'Terms and Conditions',
                'meta_description' => 'Pure Drop Building Cleaning Services LLC Terms and Conditions - Service agreements, booking terms, and customer responsibilities.',
                'content' => '
                    <div class="prose max-w-none text-gray-700 space-y-6">
                        <p class="text-sm text-gray-500">Last updated: October 2026</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">1. Agreement to Terms</h2>
                        <p>By scheduling a service with Pure Drop Building Cleaning Services LLC or using our website, you agree to comply with and be bound by these Terms and Conditions. Please review them carefully before booking.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">2. Service Booking & Access</h2>
                        <ul class="list-disc pl-6 space-y-1">
                            <li><strong>Access to Premises:</strong> Customers must ensure our cleaning staff has legal, safe, and unobstructed access to the property at the agreed booking time, including any necessary building security gate passes.</li>
                            <li><strong>Utilities:</strong> Running water and continuous electricity must be provided at the property to enable our cleaning machinery and team to perform the service.</li>
                            <li><strong>Valuables:</strong> While our staff are thoroughly vetted and trained, we advise customers to securely store high-value items, jewelry, cash, and sensitive documents prior to our arrival.</li>
                        </ul>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">3. Pricing & Payments</h2>
                        <p>All prices quoted are in UAE Dirhams (AED) and are based on the property specifications and scope of service provided during the booking. Additional charges may apply if the scope of work or property condition significantly exceeds the initial description.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">4. Quality Assurance & Inspections</h2>
                        <p>We take pride in our work. We recommend that the customer or their representative inspects the premises with our team leader upon job completion. If any agreed area does not meet your expectations, notify our team immediately so we can rectify that specific area before departure.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">5. Governing Law</h2>
                        <p>These terms and conditions are governed by and construed in accordance with the laws of the Emirate of Dubai and the federal laws of the United Arab Emirates.</p>
                    </div>
                ',
                'is_active' => true,
                'show_in_header' => false,
                'show_in_footer' => true,
            ],
            [
                'slug' => 'refund-policy',
                'title' => 'Refund Policy',
                'meta_description' => 'Pure Drop Building Cleaning Services LLC Refund & Cancellation Policy - Clear guidelines on cancellations, rescheduling, and satisfaction guarantee.',
                'content' => '
                    <div class="prose max-w-none text-gray-700 space-y-6">
                        <p class="text-sm text-gray-500">Last updated: October 2026</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">1. Cancellation & Rescheduling</h2>
                        <p>We understand that schedules change. To accommodate our cleaning staff schedules, we kindly ask for advance notice:</p>
                        <ul class="list-disc pl-6 space-y-1">
                            <li><strong>Advance Notice (12+ hours):</strong> You may reschedule or cancel your cleaning appointment free of charge up to 12 hours before the scheduled arrival time.</li>
                            <li><strong>Short Notice (Under 6 hours):</strong> Cancellations made less than 6 hours prior to the appointment or upon staff arrival at the premises may incur a late cancellation dispatch fee of AED 50 to cover staff transportation costs.</li>
                        </ul>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">2. Quality Commitment & Follow-up</h2>
                        <p>Because cleaning is an on-demand service, direct cash refunds are generally not offered once service is completed. Instead, we are committed to customer satisfaction: If you are dissatisfied with any agreed area cleaned, please notify us within 24 hours of service completion, and our team will review and address the specific disputed areas.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">3. Pre-paid Bookings & Package Refunds</h2>
                        <p>For prepaid package plans (weekly or monthly recurring plans), unused sessions can be paused or transferred to a future date. If you wish to cancel an active multi-session package before completion, refunds will be calculated pro-rata based on standard single-session rates for completed sessions, with the remaining balance returned to your original payment method within 7-14 business days.</p>

                        <h2 class="text-xl font-bold text-dark mt-6 mb-3">4. Contact Us</h2>
                        <p>For any questions regarding cancellations, rescheduling, or refund inquiries, please contact our support desk directly via phone at +971 56 217 0386 or email info.puredropcleaning@gmail.com.</p>
                    </div>
                ',
                'is_active' => true,
                'show_in_header' => false,
                'show_in_footer' => true,
            ],
        ];

        foreach ($policies as $data) {
            Page::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }
}
