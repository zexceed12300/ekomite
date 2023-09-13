<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\TapelController;
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

Route::resource('/', DashboardController::class)->middleware(['auth']);

Route::resource('siswa', SiswaController::class)->middleware(['auth']);
Route::resource('angsuran', AngsuranController::class)->middleware(['auth', 'permission:manage settings']);
Route::resource('tapel', TapelController::class)->middleware(['auth', 'permission:manage settings']);

Route::resource('laporan', LaporanController::class)->middleware(['auth', 'permission:manage pembayaran']);
Route::get('/laporan-download', [LaporanController::class, 'download'])->name('laporan.download')->middleware(['auth', 'permission:manage pembayaran']);

Route::resource('pembayaran', PembayaranController::class)->middleware(['auth', 'permission:manage pembayaran']);

Route::resource('bendahara', BendaharaController::class)->middleware(['auth', 'role:admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';
