<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


Route::get('/users', [UserController::class, 'index']);


Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});
