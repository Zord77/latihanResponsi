<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/bahanbaku/view', function () {
    return view('bahanbaku');
});

Route::get('/bahanbaku/create', function () {
    return view('createBahanBaku');
});

Route::post('/bahanbaku', [App\Http\Controllers\Api\BahanBakuController::class, 'store']);
Route::get('/bahanbaku/edit/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'edit']);
Route::put('/bahanbaku/update/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'update'])->name('bahanbaku.update');
Route::delete('/bahanbaku/delete/{id}', [App\Http\Controllers\Api\BahanBakuController::class, 'destroy']);
Route::get('/bahanbaku/view', [App\Http\Controllers\Api\BahanBakuController::class, 'view']);

Route::post('/ubahPassword', [App\Http\Controllers\Api\UbahPasswordController::class, 'ubahPassword']);
Route::get('/viewChangePass', [App\Http\Controllers\Api\UbahPasswordController::class, 'index']);
Route::get('/verifGantiPW/{verify_pass_key}', [App\Http\Controllers\Api\UbahPasswordController::class, 'verifGantiPW']);