<?php

use Illuminate\Support\Facades\Route;
use App\Http\Routes\Pessoa;

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

Pessoa::routes();

Route::get('/', function () {
    return redirect('/pessoa/listar');
});
