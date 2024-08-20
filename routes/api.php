<?php

use App\Http\Controllers\CarneController;
use Illuminate\Support\Facades\Route;

Route::middleware('api')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    
    Route::post('/carne', [CarneController::class, 'criarCarne']);
    Route::get('/carne/{id}', [CarneController::class, 'recuperarParcelas']);
});