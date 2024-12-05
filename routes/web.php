<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\ProfileController;

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')
->middleware('auth');
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard')
->middleware('auth');
Route::get('absen', [AbsenController::class, 'absen'])->name('absen')
->middleware('auth');
Route::post('saveabsen', [AbsenController::class, 'saveabsen'])->name('saveabsen')
->middleware('auth');
Route::get('profile', [ProfileController::class, 'profile'])->name('profile')
->middleware('auth');

Route::get('/ketidakhadiran', function () {
    return view('ketidakhadiran', ['active' => 'ketidakhadiran']);
});
Route::post('saveketidakhadiran', [AbsenController::class, 'saveketidakhadiran'])->name('saveketidakhadiran')
->middleware('auth');
Route::get('monitoring', [MonitoringController::class, 'monitoring'])->name('monitoring')
->middleware('auth');
Route::get('laporan', [MonitoringController::class, 'laporan'])->name('laporan')
->middleware('auth');

Route::get('karyawan', [KaryawanController::class, 'karyawan'])->name('karyawan')
->middleware('auth');
Route::get('addkaryawan', [KaryawanController::class, 'addkaryawan'])->name('addkaryawan')
->middleware('auth');
Route::post('savekaryawan', [KaryawanController::class, 'savekaryawan'])->name('savekaryawan')
->middleware('auth');
Route::get('editkaryawan/{id}', [KaryawanController::class, 'editkaryawan'])->name('editkaryawan')
->middleware('auth');
Route::post('updatekaryawan', [KaryawanController::class, 'updatekaryawan'])->name('updatekaryawan')
->middleware('auth');
Route::post('updateprofile', [KaryawanController::class, 'updateprofile'])->name('updateprofile')
->middleware('auth');
Route::delete('deletekaryawan', [KaryawanController::class, 'deletekaryawan'])->name('deletekaryawan')
->middleware('auth');
Route::post('cetaklaporan', [MonitoringController::class, 'cetaklaporan'])->name('cetaklaporan')
->middleware('auth');

Route::get('detailabsen/{id}', [MonitoringController::class, 'detailabsen'])->name('detailabsen')
->middleware('auth');