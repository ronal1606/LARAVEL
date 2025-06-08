// File: /PaginaAgro/PaginaAgro/routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\VerifyCode;

Route::get('/login', Login::class)->name('login');
Route::get('/verify-code', VerifyCode::class)->name('verify.code');