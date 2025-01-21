<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/createUser', 'App\Http\Controllers\AuthController@createUser');

Route::get('/login', 'App\Http\Controllers\AuthController@loging');

Route::delete('/logout', 'App\Http\Controllers\AuthController@logOut')->middleware('auth:sanctum');;

