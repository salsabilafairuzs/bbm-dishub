<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::View('/login', 'login');
Route::View ('/dashboard', 'dashboard');
Route::View ('/transaksi1', 'transaksi1');
Route::View ('/transaksi2', 'transaksi2');
Route::View ('/transaksi3', 'transaksi3');