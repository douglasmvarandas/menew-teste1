<?php

use Illuminate\Support\Facades\Auth;
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
    return redirect('contacts');
});

Route::get('/dashboard', function () {
    return redirect('contacts');
});

Route::middleware(['auth:sanctum', 'verified'])->resource('contacts',
    \App\Http\Controllers\ContactController::class);
