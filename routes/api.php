<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;



Route::middleware('auth')->get('/category',[CategoryController::class,'getall']);

Route::middleware('auth')->get('/product/{category_id?}',[ProductController::class,'getOneOrGetById']);
Route::middleware('auth')->post('/product',[ProductController::class,'create']);


Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class ,'login']);
    Route::post('logout', [AuthController::class ,'logout']);
    Route::post('refresh', [AuthController::class ,'refresh']);
    Route::post('me', [AuthController::class ,'me']);

});
