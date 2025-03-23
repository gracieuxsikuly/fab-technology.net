<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'backend.dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
    Route::view('aboutus', 'backend.about')
    ->middleware(['auth', 'verified'])
    ->name('about');
    Route::view('nos-realisation', 'backend.realisation')
    ->middleware(['auth', 'verified'])
    ->name('realisation');

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
