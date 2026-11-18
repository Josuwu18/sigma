<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PensumController;

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

Route::get('/carreras', [PensumController::class, 'carreras']);
Route::get('/carreras/{id}/pensum', [PensumController::class, 'pensumPorCarrera']);
