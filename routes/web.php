<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;

Route::get('/',[HomeController::class,'home']);
Route::get('login',[HomeController::class,'login']);
Route::get('about',[HomeController::class,'about']);
Route::get('service',[HomeController::class,'service']);
Route::get('contact',[HomeController::class,'contact']);

//backend route
Route::get('backend/dashboard',[BackendController::class,'dashboard']);