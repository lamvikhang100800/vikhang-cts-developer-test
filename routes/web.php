<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FromController;


Route::get('/',[LoginController::class,'show']);
Route::post('/login',[LoginController::class,'login']);
Route::get('/form',[FromController::class,'show']);

Route::post('/create-category',[FromController::class,'create']);
Route::get('/show-update/{id}',[FromController::class,'showUpdate']);
Route::post('/update/{id}',[FromController::class,'update']);
Route::get('/delete/{id}',[FromController::class,'delete']);





