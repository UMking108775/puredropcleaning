@extends('layouts.admin')

@section('title', 'Mailer Settings')
@section('page-title', 'Mailer Settings')

@section('content')
<div class="max-w-3xl">
    <div class="mb-6">
        <p class="text-gray">Configure your email settings for sending quote responses and notifications.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8 mb-6">
        <h3 class="text-lg font-semibold text-dark mb-6 flex items-center">
            <svg class="w-5 h-5 mr-2 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            SMTP Configuration
        </h3>
        
        <form action="{{ route('admin.settings.mailer.update') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="MAIL_MAILER" class="block text-sm font-medium text-dark mb-2">Mail Driver</label>
                    <select id="MAIL_MAILER" name="MAIL_MAILER" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <option value="smtp" {{ $settings['MAIL_MAILER'] === 'smtp' ? 'selected' : '' }}>SMTP</option>
                        <option value="sendmail" {{ $settings['MAIL_MAILER'] === 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                        <option value="mailgun" {{ $settings['MAIL_MAILER'] === 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                        <option value="ses" {{ $settings['MAIL_MAILER'] === 'ses' ? 'selected' : '' }}>Amazon SES</option>
                        <option value="log" {{ $settings['MAIL_MAILER'] === 'log' ? 'selected' : '' }}>Log (Testing)</option>
                    </select>
                </div>

                <div>
                    <label for="MAIL_ENCRYPTION" class="block text-sm font-medium text-dark mb-2">Encryption</label>
                    <select id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION" 
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors">
                        <option value="tls" {{ $settings['MAIL_ENCRYPTION'] === 'tls' ? 'selected' : '' }}>TLS</option>
                        <option value="ssl" {{ $settings['MAIL_ENCRYPTION'] === 'ssl' ? 'selected' : '' }}>SSL</option>
                        <option value="" {{ empty($settings['MAIL_ENCRYPTION']) ? 'selected' : '' }}>None</option>
                    </select>
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="MAIL_HOST" class="block text-sm font-medium text-dark mb-2">SMTP Host *</label>
                    <input type="text" id="MAIL_HOST" name="MAIL_HOST" required
                        value="{{ $settings['MAIL_HOST'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="smtp.gmail.com">
                    @error('MAIL_HOST')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="MAIL_PORT" class="block text-sm font-medium text-dark mb-2">SMTP Port *</label>
                    <input type="text" id="MAIL_PORT" name="MAIL_PORT" required
                        value="{{ $settings['MAIL_PORT'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="587">
                    @error('MAIL_PORT')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="MAIL_USERNAME" class="block text-sm font-medium text-dark mb-2">SMTP Username</label>
                    <input type="text" id="MAIL_USERNAME" name="MAIL_USERNAME"
                        value="{{ $settings['MAIL_USERNAME'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="your@email.com">
                </div>

                <div>
                    <label for="MAIL_PASSWORD" class="block text-sm font-medium text-dark mb-2">SMTP Password</label>
                    <input type="password" id="MAIL_PASSWORD" name="MAIL_PASSWORD"
                        value="{{ $settings['MAIL_PASSWORD'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="••••••••">
                    <p class="mt-1 text-xs text-gray">For Gmail, use an App Password</p>
                </div>
            </div>

            <hr class="border-gray-100">

            <h4 class="text-md font-semibold text-dark">Sender Information</h4>

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="MAIL_FROM_ADDRESS" class="block text-sm font-medium text-dark mb-2">From Email Address *</label>
                    <input type="email" id="MAIL_FROM_ADDRESS" name="MAIL_FROM_ADDRESS" required
                        value="{{ $settings['MAIL_FROM_ADDRESS'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="noreply@puredropcleaning.com">
                    @error('MAIL_FROM_ADDRESS')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="MAIL_FROM_NAME" class="block text-sm font-medium text-dark mb-2">From Name *</label>
                    <input type="text" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME" required
                        value="{{ $settings['MAIL_FROM_NAME'] }}"
                        class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        placeholder="PureDropCleaning">
                    @error('MAIL_FROM_NAME')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="btn btn-primary">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Save Settings
                </button>
            </div>
        </form>
    </div>

    <!-- Test Email Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 lg:p-8">
        <h3 class="text-lg font-semibold text-dark mb-4 flex items-center">
            <svg class="w-5 h-5 mr-2 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Test Email Configuration
        </h3>
        <p class="text-sm text-gray mb-4">Send a test email to verify your configuration is working correctly.</p>
        
        <form action="{{ route('admin.settings.mailer.test') }}" method="POST" class="flex items-end gap-4">
            @csrf
            <div class="flex-1">
                <label for="test_email" class="block text-sm font-medium text-dark mb-2">Test Email Address</label>
                <input type="email" id="test_email" name="test_email" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                    placeholder="test@example.com">
            </div>
            <button type="submit" class="btn btn-outline whitespace-nowrap">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                Send Test
            </button>
        </form>
    </div>

    <!-- Common SMTP Settings Guide -->
    <div class="mt-6 bg-sky/10 rounded-xl p-6">
        <h4 class="text-md font-semibold text-dark mb-3">Common SMTP Settings</h4>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-white rounded-lg p-4">
                <p class="font-medium text-dark mb-2">Gmail</p>
                <p class="text-gray">Host: smtp.gmail.com</p>
                <p class="text-gray">Port: 587 | Encryption: TLS</p>
            </div>
            <div class="bg-white rounded-lg p-4">
                <p class="font-medium text-dark mb-2">Outlook/Office 365</p>
                <p class="text-gray">Host: smtp.office365.com</p>
                <p class="text-gray">Port: 587 | Encryption: TLS</p>
            </div>
        </div>
    </div>
</div>
@endsection
