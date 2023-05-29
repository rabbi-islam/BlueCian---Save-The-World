<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\RescueController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return redirect()->route('login');
})->middleware('guest');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/rescue-request', [RescueController::class, 'index'])->middleware(['auth', 'verified'])->name('rescue.request');
Route::post('/rescue-new', [RescueController::class, 'new'])->middleware(['auth', 'verified'])->name('rescue.new');
Route::put('/rescue-status', [RescueController::class, 'status'])->middleware(['auth', 'verified'])->name('rescue.status');

Route::get('/notification', function () {
    return Inertia::render('Notification');
})->middleware(['auth', 'verified'])->name('notification');

Route::get('/maps', function () {
    return Inertia::render('Maps');
})->middleware(['auth', 'verified'])->name('maps');

Route::get('/branch', function () {
    return Inertia::render('Branch');
})->middleware(['auth', 'verified'])->name('branch');

Route::get('/vehicles-list', [VehicleController::class, 'index'])->middleware(['auth', 'verified'])->name('vehicles.list');
Route::post('/vehicle-new', [VehicleController::class, 'new'])->middleware(['auth', 'verified'])->name('vehicle.new');

Route::get('/team-list', function () {
    return Inertia::render('TeamList');
})->middleware(['auth', 'verified'])->name('team.list');

Route::get('/gallery', function () {
    return Inertia::render('Gallery');
})->middleware(['auth', 'verified'])->name('gallery');

Route::get('/video', function () {
    return Inertia::render('Video');
})->middleware(['auth', 'verified'])->name('video');

Route::get('/faq', [FaqController::class, 'index'])->middleware(['auth', 'verified'])->name('faq');

Route::get('/terms', function () {
    return Inertia::render('Terms');
})->middleware(['auth', 'verified'])->name('terms');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
