<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Show the Why Choose Us section editor.
     */
    public function whyChooseUs()
    {
        $settings = Setting::getGroup('why_choose_us');

        // Default values
        $defaults = [
            'wcu_style' => 'style1',
            'wcu_badge' => 'Why Choose Us',
            'wcu_heading' => 'We Make Your Space <span class="text-primary">Shine Bright</span>',
            'wcu_subtitle' => 'With years of experience in the cleaning industry, we understand what it takes to deliver exceptional results.',
            'wcu_feature1_title' => 'Trusted & Verified Staff',
            'wcu_feature1_desc' => 'All our cleaners are background-checked and professionally trained.',
            'wcu_feature2_title' => 'Eco-Friendly Products',
            'wcu_feature2_desc' => 'We use environmentally safe cleaning solutions that are gentle yet effective.',
            'wcu_feature3_title' => 'Flexible Scheduling',
            'wcu_feature3_desc' => 'Book at your convenience - we work around your schedule.',
            'wcu_feature4_title' => '100% Satisfaction Guarantee',
            'wcu_feature4_desc' => "Not happy? We'll re-clean for free. That's our promise.",
            'wcu_stat1_value' => '10+',
            'wcu_stat1_label' => 'Years Experience',
            'wcu_stat2_value' => '5000+',
            'wcu_stat2_label' => 'Happy Clients',
            'wcu_stat3_value' => '15+',
            'wcu_stat3_label' => 'Expert Cleaners',
            'wcu_stat4_value' => '98%',
            'wcu_stat4_label' => 'Client Satisfaction',
        ];

        // Merge defaults with saved settings
        $data = array_merge($defaults, $settings);

        return view('admin.sections.why-choose-us', compact('data'));
    }

    /**
     * Update the Why Choose Us section.
     */
    public function updateWhyChooseUs(Request $request)
    {
        $fields = [
            'wcu_style',
            'wcu_badge', 'wcu_heading', 'wcu_subtitle',
            'wcu_feature1_title', 'wcu_feature1_desc',
            'wcu_feature2_title', 'wcu_feature2_desc',
            'wcu_feature3_title', 'wcu_feature3_desc',
            'wcu_feature4_title', 'wcu_feature4_desc',
            'wcu_stat1_value', 'wcu_stat1_label',
            'wcu_stat2_value', 'wcu_stat2_label',
            'wcu_stat3_value', 'wcu_stat3_label',
            'wcu_stat4_value', 'wcu_stat4_label',
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                Setting::set($field, $request->input($field), 'why_choose_us');
            }
        }

        Setting::clearGroupCache('why_choose_us');

        return redirect()->route('admin.sections.why-choose-us')
            ->with('success', 'Why Choose Us section updated successfully!');
    }
}
