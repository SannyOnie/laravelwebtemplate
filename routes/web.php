<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\ProductController;


//fontend route
Route::get('/',[HomeController::class,'home']);
Route::get('login',[HomeController::class,'login']);
Route::get('about',[HomeController::class,'about']);
Route::get('service',[HomeController::class,'service']);
Route::get('contact',[HomeController::class,'contact']);

//backend route
Route::group(
    ['prefix'=>'backend'

    ],function(){
        Route::get('/',[BackendController::class,'dashboard']);
        Route::get('dashboard',[BackendController::class,'dashboard']);
        Route::get('employees',[BackendController::class,'employees']);
        Route::get('employeelist',[BackendController::class,'employeelist']);

        Route::resource('products',ProductController::class);

    }
);
