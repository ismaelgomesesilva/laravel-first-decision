<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index')->middleware('auth');

Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produtos.create')->middleware('auth');
Route::post('/produtos', [ProdutoController::class, 'store'])->name('produtos.store')->middleware('auth');
Route::get('/produtos/{produto}', [ProdutoController::class, 'show'])->name('produtos.show')->middleware('auth');
Route::get('/produtos/{produto}/edit', [ProdutoController::class, 'edit'])->name('produtos.edit')->middleware('auth');
Route::put('/produtos/{produto}', [ProdutoController::class, 'update'])->name('produtos.update')->middleware('auth');
Route::delete('/produtos/{produto}/destroy', [ProdutoController::class, 'destroy'])->name('produtos.destroy')->middleware('auth');

require __DIR__ . '/auth.php';
