<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortifolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index']);

Route::get('adminpanel', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('settings', SettingController::class);
Route::resource('users', UserController::class);
Route::resource('services', ServiceController::class);
Route::resource('portifolios', PortifolioController::class);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/updateImage', [ProfileController::class, 'updateImage'])->name('updateImage');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
