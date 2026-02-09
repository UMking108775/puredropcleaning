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
}
