<?php

use App\Http\Controllers\ArithmeticControllers;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{nome}', [ArithmeticControllers::class, 'hello'])->where('nome', '[a-zA-Z]{3,}')->name('hello');
;

Route::get('/conta/{numero1}/{numero2}/{operacao?}', [ArithmeticControllers::class, 'oprecao']);

Route::get('/idade/{ano}/{mes?}/{dia?}', [ArithmeticControllers::class, 'idade']);
