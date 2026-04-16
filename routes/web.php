<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
// Multilingual switcher
use App\Http\Controllers\LangController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteSettingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FooterInfoController;
use App\Http\Controllers\SocialLinkController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
Route::get('langue/{lang}', [LangController::class, 'switch'])->name('lang.switch');

Route::get('/', [HomeController::class, 'index'])->name('home'); 
Route::get('/service-details/{slug}', function ($slug) {
    return view('detailservice', ['slug' => $slug]);
})->name('servicedetails');

Route::get('/fabtech-details/{type}/{id}', function ($type, $id) {
    return view('visionmissionprojet', [
        'type' => $type,
        'id' => $id]);
})->name('visionmissionprojet');

Route::view('dashboard', 'backend.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::view('aboutus', 'backend.about')
    ->middleware(['auth', 'verified'])
    ->name('about');
    
    Route::view('nos-realisation', 'backend.realisation')
    ->middleware(['auth', 'verified'])
    ->name('realisation');

    Route::view('notre-vision', 'backend.vision')
    ->middleware(['auth', 'verified'])
    ->name('vision');
    Route::view('notre-mission', 'backend.mission')
    ->middleware(['auth', 'verified'])
    ->name('mission');
    Route::view('nos-projets', 'backend.projet')
    ->middleware(['auth', 'verified'])
    ->name('projet');
    Route::view('nos-services', 'backend.services')
    ->middleware(['auth', 'verified'])
    ->name('services');

    Route::view('notre-galerie', 'backend.gallery')
    ->middleware(['auth', 'verified'])
    ->name('gallery');
    Route::view('notre-equipe', 'backend.equipe')
    ->middleware(['auth', 'verified'])
    ->name('equipe');

    Route::view('faqs', 'backend.faqs')
    ->middleware(['auth', 'verified'])
    ->name('faqs');

    Route::view('competencedomaine', 'backend.domainecompetence')
    ->middleware(['auth', 'verified'])
    ->name('competencedomaine');

    Route::view('message', 'backend.message')
    ->middleware(['auth', 'verified'])
    ->name('message');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

/**
 * Admin Routes - Site Management
 */
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    // Users Management
    Route::resource('users', UserController::class);
    Route::put('profile/update', [UserController::class, 'updateProfile'])->name('users.updateProfile');
    Route::get('profile', [UserController::class, 'profile'])->name('users.profile');

    // Site Settings
    Route::get('settings', [SiteSettingController::class, 'edit'])->name('settings.edit');
    Route::put('settings', [SiteSettingController::class, 'update'])->name('settings.update');

    // Menus
    Route::resource('menus', MenuController::class);
    
    // Footer Infos
    Route::resource('footer-infos', FooterInfoController::class);
    
    // Social Links
    Route::resource('social-links', SocialLinkController::class);
    
    // Sliders
    Route::resource('sliders', SliderController::class);
});


require __DIR__.'/auth.php';
