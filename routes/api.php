<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortifolioController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::get('services' , [ApiController::class , 'services']);
Route::get('portifolios' , [ApiController::class , 'portifolios']);
Route::get('blogs' , [ApiController::class , 'blogs']);
Route::get('contacts' , [ApiController::class , 'contacts']);
Route::get('settings' , [ApiController::class , 'settings']);
Route::get('users' , [ApiController::class , 'users']);

Route::resource('contacts' , ContactController::class);
Route::resource('users' , UserController::class);
Route::resource('services' , ServiceController::class);
Route::resource('portifolios' , PortifolioController::class);
Route::resource('blogs' , BlogController::class);

