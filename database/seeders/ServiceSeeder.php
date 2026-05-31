<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Deep Cleaning',
                'description' => 'Thorough top-to-bottom deep cleaning for your home or workspace. We target every corner, surface and hidden spot to deliver a hygienic, sparkling environment.',
                'features' => [
                    'Top-to-bottom cleaning',
                    'Disinfection of all surfaces',
                    'Kitchen & bathroom deep clean',
                    'Floor scrubbing & mopping',
                    'Dusting of all fixtures',
                    'Hard-to-reach areas',
                    'Eco-friendly products',
                    'Quality-checked finish',
                ],
                'full_content' => '<h3>Professional Deep Cleaning</h3>
<p>Our deep cleaning service goes far beyond regular cleaning. We tackle built-up grime, hidden dust and bacteria in every corner of your home or workspace.</p>
<h3>What\'s Included</h3>
<ul>
<li><strong>All Rooms:</strong> Detailed cleaning of every room from ceiling to floor</li>
<li><strong>Kitchen:</strong> Degreasing of stoves, ovens, hoods, countertops and cabinets</li>
<li><strong>Bathrooms:</strong> Tile scrubbing, grout cleaning, sanitization</li>
<li><strong>Floors:</strong> Vacuuming, scrubbing and mopping with disinfectant</li>
</ul>
<p>Ideal for periodic refresh, pre/post-event cleaning, or whenever your space needs a true reset.</p>',
                'meta_description' => 'Professional deep cleaning service in Dubai. Top-to-bottom hygiene, disinfection and detailed cleaning for homes and offices.',
                'image' => '1.png',
                'sort_order' => 1,
            ],
            [
                'title' => 'Maid Services',
                'description' => 'Reliable maid services for everyday cleaning, tidying and household upkeep. Trained, trustworthy maids you can count on, available hourly, weekly or monthly.',
                'features' => [
                    'Daily / weekly / monthly visits',
                    'Trained female maids',
                    'English-speaking staff',
                    'Dusting & tidying',
                    'Laundry & ironing on request',
                    'Kitchen & bathroom cleaning',
                    'Flexible hours',
                    'Materials optional',
                ],
                'full_content' => '<h3>Reliable Maid Services</h3>
<p>Whether you need help a few hours a week or a dedicated maid every day, our trained professionals deliver dependable, friendly service tailored to your routine.</p>
<h3>What Our Maids Do</h3>
<ul>
<li>General dusting, tidying and organizing</li>
<li>Kitchen cleaning and dishwashing</li>
<li>Bathroom cleaning and sanitization</li>
<li>Floor sweeping, vacuuming and mopping</li>
<li>Laundry, ironing and bed making (on request)</li>
</ul>',
                'meta_description' => 'Professional maid services in Dubai. Trained, trustworthy female maids for daily, weekly or monthly home cleaning.',
                'image' => '2.png',
                'sort_order' => 2,
            ],
            [
                'title' => 'Window Cleaning',
                'description' => 'Crystal-clear, streak-free windows inside and out. We clean glass, frames, sills and tracks using professional tools and safe techniques.',
                'features' => [
                    'Interior glass cleaning',
                    'Exterior glass cleaning',
                    'Frame & sill wiping',
                    'Track cleaning',
                    'Streak-free finish',
                    'Hard water stain removal',
                    'Screen cleaning',
                    'Safe high-reach equipment',
                ],
                'full_content' => '<h3>Crystal Clear Windows</h3>
<p>Sparkling windows make your space look brighter and more welcoming. Our trained team uses professional squeegees and eco-friendly solutions for a streak-free shine every time.</p>
<h3>Where We Clean</h3>
<ul>
<li>Villas, apartments and offices</li>
<li>Glass doors, sliding panels and partitions</li>
<li>Balcony and exterior windows</li>
</ul>',
                'meta_description' => 'Professional window cleaning in Dubai. Streak-free interior and exterior glass cleaning for villas, apartments and offices.',
                'image' => '5.png',
                'sort_order' => 3,
            ],
            [
                'title' => 'Carpet Cleaning',
                'description' => 'Deep carpet cleaning with hot water extraction and steam. We remove stains, dust mites, allergens and odors to restore a fresh, like-new look.',
                'features' => [
                    'Hot water extraction',
                    'Steam sanitization',
                    'Stain & spot treatment',
                    'Odor neutralization',
                    'Allergen & dust mite removal',
                    'Fabric-safe solutions',
                    'Quick drying',
                    'Pet & child safe',
                ],
                'full_content' => '<h3>Professional Carpet Cleaning</h3>
<p>Carpets trap dust, allergens, bacteria and odors over time. Our hot water extraction and steam cleaning methods lift dirt from deep in the fibres for a healthier home.</p>
<h3>Why Choose Us</h3>
<ul>
<li>Trained technicians with professional equipment</li>
<li>Pet and child-safe cleaning agents</li>
<li>Quick drying so you can use rooms the same day</li>
</ul>',
                'meta_description' => 'Professional carpet cleaning in Dubai. Steam cleaning, stain removal and allergen extraction for a healthier home.',
                'image' => '8.png',
                'sort_order' => 4,
            ],
            [
                'title' => 'Sofa Cleaning',
                'description' => 'Bring your sofas back to life. Deep shampoo and steam cleaning that removes stains, dust, and dust mites while preserving fabric quality.',
                'features' => [
                    'Fabric & leather safe',
                    'Stain removal',
                    'Steam sanitization',
                    'Dust mite extraction',
                    'Odor elimination',
                    'Cushion deep cleaning',
                    'Fabric protection',
                    'Quick drying',
                ],
                'full_content' => '<h3>Deep Sofa Cleaning</h3>
<p>Daily use leaves your sofa with hidden dust, allergens and stains. Our professional sofa cleaning restores freshness using shampooing and steam extraction safe for all fabric types.</p>',
                'meta_description' => 'Professional sofa cleaning in Dubai. Deep shampoo and steam cleaning for fabric and leather sofas.',
                'image' => '6.png',
                'sort_order' => 5,
            ],
            [
                'title' => 'Mattress Cleaning',
                'description' => 'Hygienic mattress cleaning that eliminates dust mites, bed bugs, sweat, stains and allergens for healthier, more restful sleep.',
                'features' => [
                    'Dust mite removal',
                    'Stain & sweat treatment',
                    'Steam sanitization',
                    'Odor elimination',
                    'Allergy-friendly',
                    'All mattress sizes',
                    'Quick drying',
                    'Safe for kids & pets',
                ],
                'full_content' => '<h3>Healthier Sleep, Cleaner Mattress</h3>
<p>You spend a third of your life on your mattress. Our professional cleaning eliminates dust mites, allergens, sweat and stains for a healthier sleep environment.</p>',
                'meta_description' => 'Mattress cleaning in Dubai. Removes dust mites, stains and allergens for healthier sleep.',
                'image' => '4.png',
                'sort_order' => 6,
            ],
            [
                'title' => 'Villa Deep Cleaning',
                'description' => 'Complete deep cleaning for villas of every size. From bedrooms to gardens, we cover every inch with detail and care.',
                'features' => [
                    'All rooms & floors',
                    'Kitchen deep clean',
                    'Bathroom sanitization',
                    'Window & balcony cleaning',
                    'Floor scrubbing & polishing',
                    'Outdoor areas covered',
                    'Furniture & upholstery',
                    'Pre/post-handover ready',
                ],
                'full_content' => '<h3>Complete Villa Deep Cleaning</h3>
<p>From living rooms and bedrooms to kitchens, bathrooms, balconies and outdoor areas — our team brings every part of your villa to a sparkling, hygienic finish.</p>
<h3>Perfect For</h3>
<ul>
<li>Move-in / move-out cleaning</li>
<li>Post-construction cleaning</li>
<li>Seasonal refresh</li>
<li>Pre-event preparation</li>
</ul>',
                'meta_description' => 'Villa deep cleaning service in Dubai. Complete top-to-bottom cleaning for villas of every size.',
                'image' => '7.png',
                'sort_order' => 7,
            ],
            [
                'title' => 'Apartment Deep Cleaning',
                'description' => 'Top-to-bottom apartment deep cleaning. Perfect for move-in, move-out, or a periodic refresh of your home.',
                'features' => [
                    'All rooms cleaned',
                    'Kitchen degreasing',
                    'Bathroom sanitization',
                    'Floor scrubbing & mopping',
                    'Window & balcony cleaning',
                    'Cabinet & wardrobe wipe-down',
                    'Move-in / move-out ready',
                    'Eco-friendly products',
                ],
                'full_content' => '<h3>Apartment Deep Cleaning</h3>
<p>Whether you\'re moving in, moving out, or simply want a thorough refresh, our apartment deep cleaning leaves every room hygienic, fresh and inspection-ready.</p>',
                'meta_description' => 'Apartment deep cleaning in Dubai. Move-in / move-out and periodic deep cleans for apartments.',
                'image' => '3.png',
                'sort_order' => 8,
            ],
            [
                'title' => 'Outdoor Cleaning',
                'description' => 'Outdoor area cleaning including balconies, terraces, driveways and exterior surfaces. We restore curb appeal and remove dust, dirt and stains.',
                'features' => [
                    'Balcony & terrace cleaning',
                    'Driveway washing',
                    'Garden patio cleaning',
                    'Exterior wall wipe-down',
                    'Tile & paving scrubbing',
                    'Dust & sand removal',
                    'Pressure washing on request',
                    'Outdoor furniture cleaning',
                ],
                'full_content' => '<h3>Outdoor Cleaning Services</h3>
<p>Dubai dust and sand build up fast on outdoor areas. Our team cleans balconies, terraces, driveways and patios so the outside of your home looks as good as the inside.</p>',
                'meta_description' => 'Outdoor cleaning in Dubai. Balcony, terrace, driveway and exterior cleaning for villas and apartments.',
                'image' => '5.png',
                'sort_order' => 9,
            ],
            [
                'title' => 'Commercial Cleaning',
                'description' => 'Professional commercial cleaning for offices, shops, clinics and other businesses. Daily, weekly or one-time cleaning to keep your workplace healthy and presentable.',
                'features' => [
                    'Offices, shops, clinics',
                    'Daily / weekly / monthly plans',
                    'Workstation cleaning',
                    'Restroom sanitization',
                    'Floor maintenance',
                    'Pantry & break room cleaning',
                    'Trash & recycling',
                    'After-hours scheduling',
                ],
                'full_content' => '<h3>Commercial Cleaning You Can Rely On</h3>
<p>A clean workplace boosts productivity, impresses clients and keeps your team healthy. Our commercial cleaning plans are tailored to your business needs and schedule.</p>
<h3>We Clean</h3>
<ul>
<li>Offices and co-working spaces</li>
<li>Retail shops and showrooms</li>
<li>Clinics and salons</li>
<li>Restaurants and cafés</li>
</ul>',
                'meta_description' => 'Commercial cleaning in Dubai. Office, shop and clinic cleaning with daily, weekly and monthly plans.',
                'image' => '7.png',
                'sort_order' => 10,
            ],
            [
                'title' => 'Domestic Cleaning',
                'description' => 'Regular domestic cleaning to keep your home spotless every week. Perfect for busy families and professionals who want a clean, comfortable home without the effort.',
                'features' => [
                    'Weekly / bi-weekly visits',
                    'Living areas & bedrooms',
                    'Kitchen & bathroom cleaning',
                    'Dusting & vacuuming',
                    'Floor mopping',
                    'Trash removal',
                    'Trusted recurring staff',
                    'Flexible scheduling',
                ],
                'full_content' => '<h3>Regular Domestic Cleaning</h3>
<p>Come home to a spotless space, every time. Our domestic cleaning service handles all routine household cleaning so you can relax and enjoy your home.</p>',
                'meta_description' => 'Domestic cleaning in Dubai. Regular weekly home cleaning by trusted, trained professionals.',
                'image' => '1.png',
                'sort_order' => 11,
            ],
        ];

        $slugs = [];
        foreach ($services as $serviceData) {
            $serviceData['slug'] = Str::slug($serviceData['title']);
            $serviceData['is_active'] = true;
            $slugs[] = $serviceData['slug'];
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                $serviceData
            );
        }

        // Remove any services not in the canonical list
        Service::whereNotIn('slug', $slugs)->delete();
    }
}
