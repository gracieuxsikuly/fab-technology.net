<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home'); 
Route::get('/service-details/{slug}', function ($slug) {
    return view('detailservice', ['slug' => $slug]);
})->name('servicedetails');

Route::get('/fabtech-details/{designation}/{id}', function ($designation,$id) {
    return view('visionmissionprojet', [
        'designation' => $designation,
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


require __DIR__.'/auth.php';
