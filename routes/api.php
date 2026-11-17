<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/prueba', function () {
    return response()->json([
        'status' => 'ok',
        'mensaje' => 'Conexión exitosa con Laravel 13 desde Android/Web',
        'fecha' => now()->toDateTimeString(),
        'datos' => [
            ['id' => 1, 'nombre' => 'Matemática I'],
            ['id' => 2, 'nombre' => 'Programación II'],
        ]
    ]);
});