<?php

use Illuminate\Support\Facades\Route;
use App\Models\Service;
use App\Models\Page;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\QuoteRequestController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\ContactController;

// Home Page
Route::get('/', function () {
    $services = Service::active()->ordered()->get();
    return view('home', compact('services'));
})->name('home');

// Services Page (list all services)
Route::get('/services', function () {
    $services = Service::active()->ordered()->get();
    return view('services', compact('services'));
})->name('services');

// Individual Service Page (by slug)
Route::get('/service/{slug}', function ($slug) {
    $service = Service::where('slug', $slug)->where('is_active', true)->firstOrFail();
    $otherServices = Service::active()->where('id', '!=', $service->id)->ordered()->take(4)->get();
    return view('service-detail', compact('service', 'otherServices'));
})->name('service.show');

// About Page
Route::get('/about', function () {
    $page = Page::where('slug', 'about-us')->orWhere('slug', 'about')->where('is_active', true)->first();
    return view('about', compact('page'));
})->name('about');

// Contact Page
Route::get('/contact', function () {
    $services = Service::active()->ordered()->get();
    return view('contact', compact('services'));
})->name('contact');

// Contact Form Submission
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Dynamic Pages (Privacy Policy, Terms, etc.)
Route::get('/page/{slug}', function ($slug) {
    $page = Page::where('slug', $slug)->where('is_active', true)->firstOrFail();
    return view('page', compact('page'));
})->name('page.show');

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Auth Routes
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        
        // Services CRUD
        Route::resource('services', ServiceController::class)->except(['show']);

        // Packages CRUD
        Route::resource('packages', PackageController::class)->except(['show']);
        
        // Pages CRUD
        Route::resource('pages', PageController::class)->except(['show']);
        
        // Quote Requests
        Route::get('/quotes', [QuoteRequestController::class, 'index'])->name('quotes.index');
        Route::get('/quotes/{quote}', [QuoteRequestController::class, 'show'])->name('quotes.show');
        Route::post('/quotes/{quote}/respond', [QuoteRequestController::class, 'respond'])->name('quotes.respond');
        Route::patch('/quotes/{quote}/close', [QuoteRequestController::class, 'close'])->name('quotes.close');
        Route::delete('/quotes/{quote}', [QuoteRequestController::class, 'destroy'])->name('quotes.destroy');


        // Settings
        Route::get('/settings/mailer', [SettingsController::class, 'mailer'])->name('settings.mailer');
        Route::post('/settings/mailer', [SettingsController::class, 'updateMailer'])->name('settings.mailer.update');
        Route::post('/settings/mailer/test', [SettingsController::class, 'testMailer'])->name('settings.mailer.test');
        Route::get('/settings/brand', [SettingsController::class, 'brand'])->name('settings.brand');
        Route::post('/settings/brand', [SettingsController::class, 'updateBrand'])->name('settings.brand.update');

        // Profile Routes
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

        // Sections (editable homepage sections)
        Route::get('/sections/why-choose-us', [SectionController::class, 'whyChooseUs'])->name('sections.why-choose-us');
        Route::put('/sections/why-choose-us', [SectionController::class, 'updateWhyChooseUs'])->name('sections.why-choose-us.update');
    });
});
