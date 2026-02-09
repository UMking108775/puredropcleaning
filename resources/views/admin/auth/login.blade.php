<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - PureDropCleaning</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-br from-primary to-primary-dark min-h-screen flex items-center justify-center font-body p-4">
    <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <img src="{{ asset('logo.png') }}" alt="PureDropCleaning" class="h-16 mx-auto mb-4">
            <h1 class="text-2xl font-bold text-dark">Admin Login</h1>
            <p class="text-gray text-sm">Sign in to manage your website</p>
        </div>

        @if($errors->any())
            <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-lg text-sm">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="email" class="block text-sm font-medium text-dark mb-2">Email Address</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                    placeholder="admin@example.com">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-dark mb-2">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                    placeholder="••••••••">
            </div>

            <button type="submit" class="w-full btn btn-primary py-3 text-lg">
                Sign In
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm text-primary hover:text-primary-dark">
                ← Back to Website
            </a>
        </div>
    </div>
</body>
</html>
