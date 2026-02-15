<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    public function mailer()
    {
        $settings = [
            'MAIL_MAILER' => env('MAIL_MAILER', 'smtp'),
            'MAIL_HOST' => env('MAIL_HOST', ''),
            'MAIL_PORT' => env('MAIL_PORT', '587'),
            'MAIL_USERNAME' => env('MAIL_USERNAME', ''),
            'MAIL_PASSWORD' => env('MAIL_PASSWORD', ''),
            'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION', 'tls'),
            'MAIL_FROM_ADDRESS' => env('MAIL_FROM_ADDRESS', ''),
            'MAIL_FROM_NAME' => env('MAIL_FROM_NAME', 'PureDropCleaning'),
        ];

        return view('admin.settings.mailer', compact('settings'));
    }

    public function updateMailer(Request $request)
    {
        $validated = $request->validate([
            'MAIL_MAILER' => 'required|string',
            'MAIL_HOST' => 'required|string',
            'MAIL_PORT' => 'required|string',
            'MAIL_USERNAME' => 'nullable|string',
            'MAIL_PASSWORD' => 'nullable|string',
            'MAIL_ENCRYPTION' => 'nullable|string',
            'MAIL_FROM_ADDRESS' => 'required|email',
            'MAIL_FROM_NAME' => 'required|string',
        ]);

        $envPath = base_path('.env');
        $envContent = file_get_contents($envPath);

        foreach ($validated as $key => $value) {
            // Handle empty values
            $value = $value ?? '';
            
            // Escape quotes in the value
            $value = str_replace('"', '\"', $value);
            
            // Check if key exists in .env
            if (preg_match("/^{$key}=.*/m", $envContent)) {
                // Update existing key
                $envContent = preg_replace(
                    "/^{$key}=.*/m",
                    "{$key}=\"{$value}\"",
                    $envContent
                );
            } else {
                // Add new key
                $envContent .= "\n{$key}=\"{$value}\"";
            }
        }

        file_put_contents($envPath, $envContent);

        // Clear config cache to apply new settings
        Artisan::call('config:clear');

        return redirect()->route('admin.settings.mailer')
            ->with('success', 'Mailer settings updated successfully!');
    }

    public function testMailer(Request $request)
    {
        $request->validate([
            'test_email' => 'required|email',
        ]);

        try {
            \Illuminate\Support\Facades\Mail::raw('This is a test email from PureDropCleaning Admin Panel.', function ($message) use ($request) {
                $message->to($request->test_email)
                    ->subject('Test Email - PureDropCleaning');
            });

            return redirect()->route('admin.settings.mailer')
                ->with('success', 'Test email sent successfully to ' . $request->test_email);
        } catch (\Exception $e) {
            return redirect()->route('admin.settings.mailer')
                ->with('error', 'Failed to send test email: ' . $e->getMessage());
        }
    }
    public function brand()
    {
        $settings = \App\Models\Setting::getGroup('brand');

        // Default values
        $defaults = [
            'brand_name' => 'PureDropCleaning',
            'brand_logo' => 'logo.png', // Default path in public
            'brand_favicon' => '',
            'brand_address' => 'Al Jafiliya, Dubai, United Arab Emirates',
            'brand_phone' => '+971 55 101 8837',
            'brand_email' => 'info.puredropcleaning@gmail.com',
            'brand_hours' => '8:00 AM - 9:00 PM (Daily)',
            'social_facebook' => '#',
            'social_instagram' => '#',
            'social_tiktok' => '#',
            'social_whatsapp' => 'https://wa.me/971551018837',
            'meta_title_suffix' => 'Professional Cleaning Services',
        ];

        $data = array_merge($defaults, $settings);

        return view('admin.settings.brand', compact('data'));
    }

    public function updateBrand(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|string|max:255',
            'brand_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'brand_favicon' => 'nullable|image|mimes:ico,png,jpg,svg|max:1024',
            'brand_address' => 'nullable|string',
            'brand_phone' => 'nullable|string',
            'brand_email' => 'nullable|email',
            'brand_hours' => 'nullable|string',
            'social_facebook' => 'nullable|string',
            'social_instagram' => 'nullable|string',
            'social_tiktok' => 'nullable|string',
            'social_whatsapp' => 'nullable|string',
            'meta_title_suffix' => 'nullable|string',
        ]);

        $fields = [
            'brand_name', 'brand_address', 'brand_phone', 'brand_email', 'brand_hours',
            'social_facebook', 'social_instagram', 'social_tiktok', 'social_whatsapp',
            'meta_title_suffix'
        ];

        // Handle Text Fields
        foreach ($fields as $field) {
            if ($request->has($field)) {
                \App\Models\Setting::set($field, $request->input($field), 'brand');
            }
        }

        // Handle Logo Upload
        if ($request->hasFile('brand_logo')) {
            $path = $request->file('brand_logo')->store('brand', 'public');
            // Delete old logo if exists and not default
            $oldLogo = \App\Models\Setting::get('brand_logo');
            if ($oldLogo && $oldLogo !== 'logo.png' && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldLogo)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldLogo);
            }
            \App\Models\Setting::set('brand_logo', 'storage/' . $path, 'brand');
        }

        // Handle Favicon Upload
        if ($request->hasFile('brand_favicon')) {
            $path = $request->file('brand_favicon')->store('brand', 'public');
            // Delete old favicon
            $oldFavicon = \App\Models\Setting::get('brand_favicon');
            if ($oldFavicon && \Illuminate\Support\Facades\Storage::disk('public')->exists($oldFavicon)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($oldFavicon);
            }
            \App\Models\Setting::set('brand_favicon', 'storage/' . $path, 'brand');
        }

        \App\Models\Setting::clearGroupCache('brand');

        return redirect()->route('admin.settings.brand')
            ->with('success', 'Brand settings updated successfully!');
    }
}
