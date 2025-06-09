<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Livewire\Auth\VerifyCode;
use App\Livewire\CarritoPage;
use App\Livewire\Categorias;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

Volt::route('/verify-code', 'auth.verify-code')->name('verify-code');


Route::get('/categorias', Categorias::class)->name('categorias');
Volt::route('/nosotros', 'nosotros')->name('nosotros');
Volt::route('/servicios', 'servicios')->name('servicios');
Volt::route('/contactanos', 'contactanos')->name('contactanos');
Route::get('/carrito', CarritoPage::class)->name('carrito');

require __DIR__.'/auth.php';
