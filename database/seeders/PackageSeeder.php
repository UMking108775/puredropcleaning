<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            // Hourly
            [
                'name' => 'Without Materials',
                'type' => 'hourly',
                'price' => 30,
                'unit_label' => 'per hour',
                'schedule_visits' => null,
                'schedule_hours' => null,
                'features' => ['Professional trained cleaner', 'Flexible hourly booking', 'You provide cleaning supplies'],
                'badge_text' => null,
                'is_highlighted' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'With Materials',
                'type' => 'hourly',
                'price' => 40,
                'unit_label' => 'per hour',
                'schedule_visits' => null,
                'schedule_hours' => null,
                'features' => ['Professional trained cleaner', 'All cleaning materials included', 'Eco-friendly products used'],
                'badge_text' => 'Popular',
                'is_highlighted' => true,
                'sort_order' => 2,
            ],

            // Weekly
            [
                'name' => 'Without Material',
                'type' => 'weekly',
                'price' => 90,
                'unit_label' => 'per session / cleaner',
                'schedule_visits' => '3 visits per week',
                'schedule_hours' => '3 hours each visit',
                'features' => ['Same trained cleaner each visit', 'Fixed weekly schedule', 'You provide cleaning supplies'],
                'badge_text' => null,
                'is_highlighted' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'With Material',
                'type' => 'weekly',
                'price' => 90,
                'unit_label' => 'per session / cleaner',
                'schedule_visits' => '3 visits per week',
                'schedule_hours' => '3 hours each visit',
                'features' => ['Same trained cleaner each visit', 'All cleaning materials included', 'Eco-friendly products used'],
                'badge_text' => 'Recommended',
                'is_highlighted' => true,
                'sort_order' => 2,
            ],

            // Monthly
            [
                'name' => 'Without Material',
                'type' => 'monthly',
                'price' => 1300,
                'unit_label' => 'per month / cleaner',
                'schedule_visits' => '6 days per week',
                'schedule_hours' => '2 hours per visit',
                'features' => ['Dedicated cleaner', 'Fixed daily schedule', 'You provide cleaning supplies'],
                'badge_text' => null,
                'is_highlighted' => false,
                'sort_order' => 1,
            ],
            [
                'name' => 'With Material',
                'type' => 'monthly',
                'price' => 1600,
                'unit_label' => 'per month / cleaner',
                'schedule_visits' => '6 days per week',
                'schedule_hours' => '2 hours per visit',
                'features' => ['Dedicated cleaner', 'All cleaning materials included', 'Eco-friendly products used'],
                'badge_text' => 'Best Value',
                'is_highlighted' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($packages as $data) {
            $data['is_active'] = true;
            Package::updateOrCreate(
                ['type' => $data['type'], 'name' => $data['name']],
                $data
            );
        }
    }
}
