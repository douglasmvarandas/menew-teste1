<?php
namespace App\Http\Routes;

use App\Http\Controllers\PessoaController;
use Illuminate\Support\Facades\Route;

class Pessoa
{
    public static function routes ($middleware = [], $prefix='pessoa') {
        return Route::group(['middleware' => $middleware, 'prefix' => $prefix], function () {
            Route::get('/listar', [PessoaController::class, 'index']);
            Route::get('/add', [PessoaController::class, 'indexAdd']);
            Route::post('/add', [PessoaController::class, 'postAdd']);
            Route::get('/edit/{id_pessoa}', [PessoaController::class, 'indexEdit']);
            Route::post('/edit/{id_pessoa}', [PessoaController::class, 'indexPost']);
            Route::get('/delete/{id_pessoa}', [PessoaController::class, 'delete']);
        });
    }
}
