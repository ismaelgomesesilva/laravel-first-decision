<?php

use App\Http\Controllers\Api\ProdutoApiController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

use App\Models\User;

Route::get('/teste-token', function () {
    $user = User::first();
    return $user->createToken('meu-token')->plainTextToken;
});


Route::post('/gerar-token', [AuthController::class, 'gerarToken']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('produtos', ProdutoApiController::class);
});
