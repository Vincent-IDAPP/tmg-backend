<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;


Route::get('/users', [UserController::class, 'index']);
Route::group([
    'middleware' => 'api', // Applique les middlewares "api" : limite de requêtes (throttle), injection automatique de modèles, etc.
], function () {
    Route::get('/users', [UserController::class, 'index']);
    
});

Route::get('/ping', function () {
    return response()->json(['pong' => true]);
});
