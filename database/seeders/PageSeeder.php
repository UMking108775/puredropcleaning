<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        // The about page is rendered from the styled Blade view directly.
        // Deactivate any stale about-us / about records so they don't interfere
        // and don't show up in header/footer menus alongside the static link.
        Page::whereIn('slug', ['about-us', 'about'])->update([
            'is_active'      => false,
            'show_in_header' => false,
            'show_in_footer' => false,
        ]);
    }
}
