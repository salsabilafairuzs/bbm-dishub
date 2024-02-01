<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisKendaraanController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/',[DashboardController::class,'index']);
    // Route::post('/',[DashboardController::class,'index']);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('/jenis', JenisKendaraanController::class);
    Route::get('jenis-hapus/{id}', [JenisKendaraanController::class, 'destroy']);

    Route::resource('/kendaraan', KendaraanController::class);
    Route::get('kendaraan-hapus/{id}', [KendaraanController::class, 'destroy']);

    Route::resource('/transaksi', TransaksiController::class);
    Route::get('transaksi-hapus/{id}', [TransaksiController::class, 'destroy']);
    Route::get('detail-transaksi/{id}/show',[TransaksiController::class, 'show']);

    Route::resource('/laporan', LaporanController::class);
    Route::post('/laporan',[LaporanController::class,'cariLaporan']);
});

require __DIR__.'/auth.php';
