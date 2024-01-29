<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoriController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DepositoController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('auth.login');
})->name('welcome');

Auth::routes();

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('/products', ProductController::class);
    Route::resource('/categoris', CategoriController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/depositos', DepositoController::class);
    Route::resource('/tickets', TicketController::class);

    Route::get('login/{provider}', [LoginController::class, 'redirectToProvider'])->name('social.redirect');
    Route::get('login/{provider}/callback', [LoginController::class, 'handleProviderCallback']);

// Ruta específica para la lista de tickets
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
});
Route::get('/reload-captcha', [RegisterController::class, 'reloadCaptcha']);
