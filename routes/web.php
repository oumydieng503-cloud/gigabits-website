<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\EnsureAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');
Route::get('/equipe', [TeamController::class, 'index'])->name('team.index');
Route::get('/carrieres', [CareerController::class, 'index'])->name('careers.index');
Route::post('/carrieres', [CareerController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('careers.store');
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->middleware('throttle:10,1')
        ->name('login.submit');

    Route::middleware(EnsureAdmin::class)->group(function () {
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
        Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::get('/candidatures', [AdminDashboardController::class, 'applications'])->name('applications');
        Route::get('/candidatures/{application}', [AdminDashboardController::class, 'showApplication'])->name('applications.show');
        Route::get('/candidatures/{application}/cv', [AdminDashboardController::class, 'downloadCv'])->name('applications.cv');
        Route::delete('/candidatures/{application}', [AdminDashboardController::class, 'destroyApplication'])->name('applications.destroy');
        Route::get('/messages', [AdminDashboardController::class, 'messages'])->name('messages');
        Route::get('/messages/{message}', [AdminDashboardController::class, 'showMessage'])->name('messages.show');
        Route::delete('/messages/{message}', [AdminDashboardController::class, 'destroyMessage'])->name('messages.destroy');
    });
});
