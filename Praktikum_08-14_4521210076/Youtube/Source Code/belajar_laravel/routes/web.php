<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

Route::get('/', Controllers\HomeController::class)->name('home');
Route::get('/about', [Controllers\AboutController::class, 'index'])->name('about');
Route::get('/contact', [Controllers\ContactController::class, 'index'])->name('contact');
Route::get('/gallery', [Controllers\GalleryController::class, 'index'])->name('gallery');
Route::get('/my-stores', [StoreController::class, 'myStores'])->name('stores.my-stores')->middleware('auth');

Route::middleware('guest')->group(function () {
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::resource('stores.products', ProductController::class);

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::resource('stores', StoreController::class);

    Route::middleware(['can:admin'])->group(function () {
        Route::resource('users', UserController::class);
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::patch('/stores/{store}/approve', [StoreController::class, 'approve'])->name('stores.approve');
    Route::patch('/stores/{store}/reject', [StoreController::class, 'reject'])->name('stores.reject');
});
require __DIR__.'/auth.php';