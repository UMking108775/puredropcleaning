<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Full Home Cleaning',
                'description' => 'Complete home cleaning service covering all rooms, including living areas, bedrooms, kitchen, and bathrooms. Our thorough approach ensures every corner of your home sparkles.',
                'features' => [
                    'Living room deep cleaning',
                    'All bedrooms cleaning',
                    'Kitchen cleaning & sanitization',
                    'Bathroom scrubbing',
                    'Floor mopping & vacuuming',
                    'Dusting all surfaces',
                    'Window sill cleaning',
                    'Trash removal'
                ],
                'full_content' => '<h3>Complete Home Transformation</h3>
<p>Our Full Home Cleaning service is designed to give your entire home a thorough, top-to-bottom clean. Whether you need a one-time deep clean or regular maintenance, our trained professionals will leave your home spotless and fresh.</p>

<h3>What We Clean</h3>
<p>Every room in your home receives our attention, including:</p>
<ul>
<li><strong>Living Areas:</strong> Dusting, vacuuming, mopping, and organizing</li>
<li><strong>Bedrooms:</strong> Bed making, dusting, vacuuming, and surface cleaning</li>
<li><strong>Kitchen:</strong> Countertop sanitization, appliance exteriors, stovetop, and sink cleaning</li>
<li><strong>Bathrooms:</strong> Toilet, shower, tub, sink, and floor sanitization</li>
</ul>

<h3>Our Cleaning Process</h3>
<p>We follow a systematic approach to ensure nothing is missed. Our team starts from the top (ceiling fans, light fixtures) and works down to the floors, ensuring dust and debris are captured, not just moved around.</p>',
                'meta_description' => 'Professional full home cleaning service in Dubai. Complete deep cleaning for living rooms, bedrooms, kitchen & bathrooms. Eco-friendly products.',
                'image' => '1.png',
                'sort_order' => 1,
            ],
            [
                'title' => 'Kitchen Cleaning',
                'description' => 'Deep kitchen cleaning service targeting grease, grime, and food residue. We clean appliances, countertops, cabinets, and floors to restore your kitchen to pristine condition.',
                'features' => [
                    'Countertop sanitization',
                    'Stovetop & oven cleaning',
                    'Refrigerator exterior',
                    'Cabinet fronts wiping',
                    'Sink & faucet polishing',
                    'Floor mopping',
                    'Microwave cleaning',
                    'Trash bin sanitization'
                ],
                'full_content' => '<h3>Professional Kitchen Deep Clean</h3>
<p>The kitchen is the heart of your home and often the hardest to keep clean. Our kitchen cleaning service tackles built-up grease, stubborn stains, and hidden grime that regular cleaning misses.</p>

<h3>Areas We Focus On</h3>
<ul>
<li><strong>Stovetop & Oven:</strong> Degreasing and deep cleaning</li>
<li><strong>Countertops:</strong> Sanitization and polishing</li>
<li><strong>Cabinets:</strong> Exterior cleaning and degreasing</li>
<li><strong>Appliances:</strong> Exterior cleaning of all kitchen appliances</li>
<li><strong>Sink Area:</strong> Deep cleaning and polishing</li>
</ul>

<h3>Eco-Friendly Products</h3>
<p>We use food-safe, eco-friendly cleaning products that are tough on grease but safe for your family and the environment.</p>',
                'meta_description' => 'Professional kitchen cleaning service in Dubai. Deep clean for stovetops, ovens, countertops & cabinets. Food-safe, eco-friendly products.',
                'image' => '2.png',
                'sort_order' => 2,
            ],
            [
                'title' => 'Bathroom Cleaning',
                'description' => 'Thorough bathroom sanitization and cleaning. We tackle soap scum, mold, and hard water stains to leave your bathroom fresh, hygienic, and sparkling clean.',
                'features' => [
                    'Toilet deep cleaning',
                    'Shower & tub scrubbing',
                    'Sink & vanity cleaning',
                    'Mirror polishing',
                    'Tile & grout cleaning',
                    'Floor sanitization',
                    'Faucet polishing',
                    'Mold prevention treatment'
                ],
                'full_content' => '<h3>Complete Bathroom Sanitization</h3>
<p>Our bathroom cleaning service goes beyond surface cleaning. We target bacteria, mold, and buildup in all the hard-to-reach places to ensure your bathroom is truly hygienic.</p>

<h3>Our Cleaning Checklist</h3>
<ul>
<li>Toilet bowl, seat, and exterior sanitization</li>
<li>Shower and bathtub deep scrubbing</li>
<li>Glass door and mirror streak-free cleaning</li>
<li>Tile and grout cleaning</li>
<li>Sink, vanity, and countertop sanitization</li>
<li>Floor mopping with disinfectant</li>
</ul>

<h3>Anti-Bacterial Treatment</h3>
<p>We use hospital-grade disinfectants that eliminate 99.9% of bacteria and germs, leaving your bathroom not just clean, but truly sanitized.</p>',
                'meta_description' => 'Professional bathroom cleaning service in Dubai. Toilet, shower, tiles & sanitization. Hospital-grade disinfectants for a hygienic bathroom.',
                'image' => '3.png',
                'sort_order' => 3,
            ],
            [
                'title' => 'Bedroom Cleaning',
                'description' => 'Complete bedroom cleaning including dusting, vacuuming, and organizing. We ensure your personal space is clean, fresh, and conducive to restful sleep.',
                'features' => [
                    'Bed making & linen change',
                    'Mattress vacuuming',
                    'Wardrobe exterior cleaning',
                    'Dusting all surfaces',
                    'Floor vacuuming',
                    'Window sill cleaning',
                    'Light fixture dusting',
                    'Under-bed cleaning'
                ],
                'full_content' => '<h3>Your Sanctuary, Refreshed</h3>
<p>Your bedroom should be a peaceful retreat. Our bedroom cleaning service ensures every surface is dust-free, floors are spotless, and the air quality is improved.</p>

<h3>What We Include</h3>
<ul>
<li><strong>Bed:</strong> Making, linen change (if provided), pillow fluffing</li>
<li><strong>Surfaces:</strong> Dusting nightstands, dressers, and decor</li>
<li><strong>Floors:</strong> Thorough vacuuming or mopping</li>
<li><strong>Closets:</strong> Exterior cleaning, inside upon request</li>
</ul>

<h3>Allergy-Friendly Cleaning</h3>
<p>We pay special attention to dust and allergens, using HEPA-filter vacuums and hypoallergenic products to improve your sleep environment.</p>',
                'meta_description' => 'Professional bedroom cleaning service in Dubai. Dusting, vacuuming, bed making & mattress cleaning. Allergy-friendly products.',
                'image' => '4.png',
                'sort_order' => 4,
            ],
            [
                'title' => 'Window Cleaning',
                'description' => 'Professional window cleaning for crystal-clear views. We clean interior and exterior glass, frames, and sills using streak-free cleaning techniques.',
                'features' => [
                    'Interior glass cleaning',
                    'Exterior glass cleaning',
                    'Frame & sill wiping',
                    'Screen cleaning',
                    'Streak-free finish',
                    'Track cleaning',
                    'Hard water stain removal',
                    'Sliding door cleaning'
                ],
                'full_content' => '<h3>Crystal Clear Windows</h3>
<p>Clean windows transform the look of your home and let natural light flood in. Our professional window cleaning service ensures streak-free, spotless glass every time.</p>

<h3>Our Window Cleaning Process</h3>
<ul>
<li><strong>Preparation:</strong> Protecting surrounding areas</li>
<li><strong>Cleaning:</strong> Using professional squeegees and solutions</li>
<li><strong>Detailing:</strong> Frames, sills, and tracks</li>
<li><strong>Finishing:</strong> Streak-free polish</li>
</ul>

<h3>Safe & Efficient</h3>
<p>Our trained team uses proper safety equipment for high windows and balconies. We are insured and follow strict safety protocols.</p>',
                'meta_description' => 'Professional window cleaning service in Dubai. Interior & exterior glass cleaning, streak-free finish. Safe cleaning for high-rise buildings.',
                'image' => '5.png',
                'sort_order' => 5,
            ],
            [
                'title' => 'Sofa & Carpet Cleaning',
                'description' => 'Deep cleaning for sofas, carpets, and upholstery. We remove stains, odors, and allergens using professional steam cleaning and extraction methods.',
                'features' => [
                    'Sofa deep cleaning',
                    'Carpet shampooing',
                    'Stain removal',
                    'Odor elimination',
                    'Allergen extraction',
                    'Steam cleaning',
                    'Fabric protection',
                    'Quick drying'
                ],
                'full_content' => '<h3>Revive Your Upholstery</h3>
<p>Sofas and carpets accumulate dust, allergens, and stains over time. Our professional cleaning service restores them to like-new condition while extending their lifespan.</p>

<h3>Our Cleaning Methods</h3>
<ul>
<li><strong>Hot Water Extraction:</strong> Deep cleaning for carpets</li>
<li><strong>Steam Cleaning:</strong> Sanitizing upholstery</li>
<li><strong>Dry Cleaning:</strong> For delicate fabrics</li>
<li><strong>Stain Treatment:</strong> Pre-treatment for stubborn spots</li>
</ul>

<h3>Health Benefits</h3>
<p>Regular upholstery cleaning removes dust mites, allergens, and bacteria, improving indoor air quality and reducing allergy symptoms.</p>',
                'meta_description' => 'Professional sofa & carpet cleaning in Dubai. Steam cleaning, stain removal & allergen extraction. Restore your upholstery to like-new.',
                'image' => '6.png',
                'sort_order' => 6,
            ],
            [
                'title' => 'Office Cleaning',
                'description' => 'Professional commercial cleaning for offices and workspaces. We maintain clean, healthy environments that boost productivity and impress clients.',
                'features' => [
                    'Desk & workstation cleaning',
                    'Common area cleaning',
                    'Restroom sanitization',
                    'Floor maintenance',
                    'Kitchen/pantry cleaning',
                    'Trash removal',
                    'Glass & window cleaning',
                    'Disinfection services'
                ],
                'full_content' => '<h3>Professional Workspace Cleaning</h3>
<p>A clean office is essential for employee health, productivity, and creating a professional impression. Our commercial cleaning services are tailored to your business needs.</p>

<h3>Services We Offer</h3>
<ul>
<li><strong>Daily Cleaning:</strong> Regular maintenance and tidying</li>
<li><strong>Deep Cleaning:</strong> Periodic thorough cleaning</li>
<li><strong>Disinfection:</strong> High-touch surface sanitization</li>
<li><strong>Specialized:</strong> Carpet, window, and upholstery cleaning</li>
</ul>

<h3>Flexible Scheduling</h3>
<p>We understand business needs. Our cleaning can be scheduled during or after business hours, on weekends, or any time that suits your operations.</p>',
                'meta_description' => 'Professional office cleaning service in Dubai. Daily maintenance, deep cleaning & disinfection. Flexible scheduling for businesses.',
                'image' => '7.png',
                'sort_order' => 7,
            ],
            [
                'title' => 'Move In/Out Cleaning',
                'description' => 'Comprehensive cleaning for moving transitions. We prepare spaces for new occupants or ensure you get your security deposit back with our thorough cleaning.',
                'features' => [
                    'Complete deep cleaning',
                    'Appliance deep clean',
                    'Cabinet interior cleaning',
                    'Closet cleaning',
                    'Wall spot cleaning',
                    'Floor deep cleaning',
                    'Window cleaning',
                    'Final inspection ready'
                ],
                'full_content' => '<h3>Stress-Free Moving Cleaning</h3>
<p>Moving is stressful enough. Let us handle the cleaning so you can focus on your transition. Our move in/out cleaning ensures properties are spotless for the next chapter.</p>

<h3>Move-Out Cleaning</h3>
<p>Help secure your deposit back with our thorough end-of-tenancy cleaning:</p>
<ul>
<li>Complete property deep cleaning</li>
<li>Appliance interior and exterior cleaning</li>
<li>Cabinet and closet cleaning</li>
<li>Wall marks and scuffs removal</li>
</ul>

<h3>Move-In Cleaning</h3>
<p>Start fresh in your new home:</p>
<ul>
<li>Sanitization of all surfaces</li>
<li>Deep cleaning before your belongings arrive</li>
<li>Ensuring a healthy environment from day one</li>
</ul>',
                'meta_description' => 'Move in/out cleaning service in Dubai. End of tenancy cleaning, deep clean for new homes. Help with security deposit return.',
                'image' => '8.png',
                'sort_order' => 8,
            ],
        ];

        foreach ($services as $serviceData) {
            $serviceData['slug'] = Str::slug($serviceData['title']);
            $serviceData['is_active'] = true;
            Service::updateOrCreate(
                ['slug' => $serviceData['slug']],
                $serviceData
            );
        }
    }
}
