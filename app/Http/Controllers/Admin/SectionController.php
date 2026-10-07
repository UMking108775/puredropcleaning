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
            'wcu_enabled' => '1',
            'wcu_style' => 'style1',
            'wcu_badge' => 'Why Choose Us',
            'wcu_heading' => 'We Make Your Space <span class="text-primary">Shine Bright</span>',
            'wcu_subtitle' => 'With years of experience in the cleaning industry, we understand what it takes to deliver exceptional results.',
            'wcu_feature1_title' => 'Trained Cleaning Professionals',
            'wcu_feature1_desc' => 'Directly employed, uniformed and trained staff.',
            'wcu_feature2_title' => 'Professional Cleaning Materials',
            'wcu_feature2_desc' => 'Commercial-grade equipment and quality cleaning solutions.',
            'wcu_feature3_title' => 'Flexible Scheduling',
            'wcu_feature3_desc' => 'Convenient morning, afternoon and recurring slots across Dubai.',
            'wcu_feature4_title' => 'Customer Satisfaction Focused',
            'wcu_feature4_desc' => 'Attentive supervision and thorough inspection upon job completion.',
            'wcu_stat1_value' => '100%',
            'wcu_stat1_label' => 'Directly Employed',
            'wcu_stat2_value' => '7 Days',
            'wcu_stat2_label' => 'Weekly Availability',
            'wcu_stat3_value' => '30+',
            'wcu_stat3_label' => 'Dubai Communities',
            'wcu_stat4_value' => '5.0★',
            'wcu_stat4_label' => 'Google Rating',
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
        Setting::set('wcu_enabled', $request->has('wcu_enabled') ? '1' : '0', 'why_choose_us');

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
