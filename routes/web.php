<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/input', [ContentController::class, 'input'])->name('input');
Route::post('/save', [ContentController::class, 'save'])->name('save');
Route::get('/output', [ContentController::class, 'output'])->name('output');
// 下記を追記する
Route::get('/detail/{content_id}', [ContentController::class, 'detail'])->name('detail');