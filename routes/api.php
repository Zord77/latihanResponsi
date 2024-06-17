<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/bahanbaku', [App\Http\Controllers\Api\BahanBakuController::class, 'index']);
Route::post('/bahanbaku', [App\Http\Controllers\Api\BahanBakuController::class, 'store']);
Route::get('/bahanbaku/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'show']);
Route::put('/bahanbaku/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'update']);
Route::delete('/bahanbaku/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'destroy']);




