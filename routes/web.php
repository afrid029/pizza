<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;
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
    return view('home');
});

Route::post('/login',[mycontroller::class, 'login']);
Route::get('/order',[mycontroller::class, 'order']);
Route::post('/sendorder',[mycontroller::class, 'sendOrder']);
Route::get('/issue/{c}',[mycontroller::class, 'issueord'])->name('issue');
Route::get('/delete/{c}',[mycontroller::class, 'deleteord'])->name('delete');
Route::get('/admin',[mycontroller::class, 'admin']);
Route::post('/rev',[mycontroller::class, 'reven']);
