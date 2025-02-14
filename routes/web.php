<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PortifolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'])->name('site.index');
Route::post('send-contact',[HomeController::class, 'send_contact'])->name('send_contact');
Route::get('/site/blogs',[HomeController::class, 'blogs'])->name('site.blogs');
Route::get('/site/blog-detail/{slug}',[HomeController::class, 'blog_detail'])->name('site.blog.detail');
Route::get('/site/contacts',[HomeController::class, 'contacts'])->name('site.contacts');
Route::get('/site/services',[HomeController::class, 'services'])->name('site.services');
Route::get('/site/portifolios',[HomeController::class, 'portifolios'])->name('site.portifolios');





Route::prefix('creator')->middleware(['auth', 'verified'])->group(function () {
Route::get('adminpanel', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('settings', SettingController::class);
    Route::resource('users', UserController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('portifolios', PortifolioController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('blogs', BlogController::class);
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/updateImage', [ProfileController::class, 'updateImage'])->name('updateImage');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
