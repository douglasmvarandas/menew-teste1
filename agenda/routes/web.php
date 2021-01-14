<?php

use App\Http\Controllers\ContatoController;
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
    return redirect()->route('contato.index');
});

Route::prefix('contatos')->group(function () {
    Route::get('/index', [ContatoController::class, 'index'])->name('contato.index');
    Route::get('/create', [ContatoController::class, 'create'])->name('contato.create');
    Route::get('/edit/{id}', [ContatoController::class, 'edit'])->name('contato.edit');

    Route::post('/store', [ContatoController::class, 'store'])->name('contato.store');
    Route::post('/update/{id}', [ContatoController::class, 'update'])->name('contato.update');
    Route::get('/delete/{id}', [ContatoController::class, 'delete'])->name('contato.delete');
});
