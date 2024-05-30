<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbmController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    Route::get('/change-password', [AuthenticatedSessionController::class, 'changePassword']);
    Route::post('/change-password', [AuthenticatedSessionController::class, 'processChangePassword']);

    Route::get('/',[DashboardController::class,'index']);
    // Route::post('/',[DashboardController::class,'index']);
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    Route::resource('/jenis', JenisKendaraanController::class);
    Route::get('jenis-hapus/{id}', [JenisKendaraanController::class, 'destroy']);

    Route::resource('/kendaraan', KendaraanController::class);
    Route::get('kendaraan-hapus/{id}', [KendaraanController::class, 'destroy']);

    Route::resource('/bbm', BbmController::class);
    Route::get('bbm-hapus/{id}', [BbmController::class, 'destroy']);

    Route::resource('/anggaran', AnggaranController::class);
    Route::get('anggaran-hapus/{id}', [AnggaranController::class, 'destroy']);

    Route::resource('/transaksi', TransaksiController::class);
    Route::get('transaksi-hapus/{id}', [TransaksiController::class, 'destroy']);
    Route::get('detail-transaksi/{id}/show',[TransaksiController::class, 'show']);
    Route::post('ubah-status',[TransaksiController::class, 'ubahStatus'])->name('ubah-status');

    Route::resource('/laporan', LaporanController::class);
    Route::post('/laporan',[LaporanController::class,'cariLaporan']);

    // Manajemen User
    Route::get('manajemen-user',[UserController::class,'manajemenUser']);
    Route::get('tambah-user',[UserController::class,'create']);
    Route::get('edit-user/{id}',[UserController::class,'edit']);
    Route::post('save-user',[UserController::class,'store']);
    Route::post('update-user/{id}',[UserController::class,'update']);


});

require __DIR__.'/auth.php';
