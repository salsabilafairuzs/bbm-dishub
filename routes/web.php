<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\RodaDuaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RodaEmpatController;
use App\Http\Controllers\Transaksi1Controller;
use App\Http\Controllers\Transaksi2Controller;
use App\Http\Controllers\Transaksi3Controller;
use App\Http\Controllers\Transaksi4Controller;
use App\Http\Controllers\PerlengkapanController;

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
// Route::View ('/dashboard', 'dashboard');

Route::get('/dashboard',[DashboardController::class,'index']);
Route::get('/',[DashboardController::class,'index']);

Route::resource('/bus', BusController::class);
Route::get('bus-hapus/{id}', [BusController::class, 'destroy']);
Route::resource('/rodaempat', RodaEmpatController::class);
Route::get('rodaempat-hapus/{id}', [RodaEmpatController::class, 'destroy']);
Route::resource('/rodadua', RodaDuaController::class);
Route::get('rodadua-hapus/{id}', [RodaDuaController::class, 'destroy']);
Route::resource('/perlengkapan', PerlengkapanController::class);
Route::get('perlengkapan-hapus/{id}', [PerlengkapanController::class, 'destroy']);

Route::resource('/transaksi1', Transaksi1Controller::class);
Route::get('transaksi1-hapus/{id}', [Transaksi1Controller::class, 'destroy']);
Route::get('detail-transaksi1/{id}/show',[Transaksi1Controller::class, 'show']); //tambahkan kode ini untuk model

Route::resource('/transaksi2', Transaksi2Controller::class);
Route::get('transaksi2-hapus/{id}', [Transaksi2Controller::class, 'destroy']);
Route::get('detail-transaksi2/{id}/show',[Transaksi2Controller::class, 'show']); //tambahkan kode ini untuk model


Route::resource('/transaksi3', Transaksi3Controller::class);
Route::get('transaksi3-hapus/{id}', [Transaksi3Controller::class, 'destroy']);
Route::get('detail-transaksi3/{id}/show',[Transaksi3Controller::class, 'show']); //tambahkan kode ini untuk model


Route::resource('/transaksi4', Transaksi4Controller::class);
Route::get('transaksi4-hapus/{id}', [Transaksi4Controller::class, 'destroy']);
Route::get('detail-transaksi4/{id}/show',[Transaksi4Controller::class, 'show']); //tambahkan kode ini untuk model

Route::resource('/laporan', Transaksi3Controller::class);

// Route::View ('/transaksi1', 'transaksi1');
// Route::View ('/transaksi2', 'transaksi2');
// Route::View ('/transaksi3', 'transaksi3');
// Route::View ('/transaksi4', 'transaksi4');
Route::View ('/template', 'template.template');