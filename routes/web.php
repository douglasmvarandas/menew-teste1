<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('administrator.index');
});

Route::prefix('administrador')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('administrator.index');
    Route::get('/tabela', [App\Http\Controllers\AdminController::class, 'tableJson'])->name('administrator.table.json');
    Route::post('/criar', [App\Http\Controllers\AdminController::class, 'store'])->name('administrator.store');
    Route::post('/deletar', [App\Http\Controllers\AdminController::class, 'destroy'])->name('administrator.destroy');
    Route::get('/editar', [App\Http\Controllers\AdminController::class, 'edit'])->name('administrator.edit');
    Route::post('/atualizar', [App\Http\Controllers\AdminController::class, 'update'])->name('administrator.update');
    Route::get('/visualizar', [App\Http\Controllers\AdminController::class, 'show'])->name('administrator.show');
});
