<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DataAlatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShiftKerjaController;
use App\Http\Controllers\SparePartController;
use App\Http\Controllers\UserController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'landing']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
});
Route::get('/home', function () {
    return redirect('/dashboard/admin');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/dashboard/supervisor', [AdminController::class, 'supervisor'])->middleware('userAkses:supervisor');
    Route::get('/dashboard/kitchen', [AdminController::class, 'kitchen'])->middleware('userAkses:kitchen');
    Route::get('/dashboard/pelanggan', [AdminController::class, 'pelanggan'])->middleware('userAkses:pelanggan');
    Route::get('/dashboard/waiter', [AdminController::class, 'waiter'])->middleware('userAkses:waiter');
    Route::get('/dashboard/kasir', [AdminController::class, 'kasir'])->middleware('userAkses:kasir');
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');

    // Route User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/supervisor', [UserController::class, 'index_supervisor'])->name('user.index_supervisor');
    Route::get('/user/kitchen', [UserController::class, 'index_kitchen'])->name('user.index_kitchen');
    Route::get('/user/kasir', [UserController::class, 'index_kasir'])->name('user.index_kasir');
    Route::get('/user/waiter', [UserController::class, 'index_waiter'])->name('user.index_waiter');
    Route::get('/user/pelanggan', [UserController::class, 'index_pelanggan'])->name('user.index_pelanggan');
    // Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    // Route Setting
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::post('/setting/edit/{id}', [SettingController::class, 'edit'])->name('setting.edit');

    // Route profie
    Route::get('/user/profile', [UserController::class, 'profile'])->name('profile');
    Route::put('/user/profile/{id}', [UserController::class, 'update_profile'])->name('user.update-profile');



    // Route Data Kategori
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('kategori/edit/{id_kategori}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('kategori/update/{id_kategori}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('kategori/delete/{id_kategori}', [KategoriController::class, 'delete'])->name('kategori.delete');

    Route::get('/laporan/user/admin', [LaporanController::class, 'admin'])->name('user.laporan_admin');
    Route::get('/laporan/user/supervisor', [LaporanController::class, 'supervisor'])->name('user.laporan_supervisor');
    Route::get('/laporan/user/kitchen', [LaporanController::class, 'kitchen'])->name('user.laporan_kitchen');
    Route::get('/laporan/user/kasir', [LaporanController::class, 'kasir'])->name('user.laporan_kasir');
    Route::get('/laporan/user/waiter', [LaporanController::class, 'waiter'])->name('user.laporan_waiter');
    Route::get('/laporan/user/pelanggan', [LaporanController::class, 'pelanggan'])->name('user.laporan_pelanggan');
    Route::get('/laporan/laporan/kategori', [LaporanController::class, 'kategori'])->name('kategori.laporan');
    Route::get('/laporan/laporan/outlet', [LaporanController::class, 'outlet'])->name('outlet.laporan');
});

Route::middleware(['auth', 'outlet.filter'])->group(function () {

    // Route Data outlet
    Route::get('/outlet', [OutletController::class, 'index'])->name('outlet.index');
    Route::get('/outlet/create', [OutletController::class, 'create'])->name('outlet.create');
    Route::post('outlet/store', [OutletController::class, 'store'])->name('outlet.store');
    Route::get('outlet/edit/{id_outlet}', [OutletController::class, 'edit'])->name('outlet.edit');
    Route::put('outlet/update/{id_outlet}', [OutletController::class, 'update'])->name('outlet.update');
    Route::delete('outlet/delete/{id_outlet}', [OutletController::class, 'delete'])->name('outlet.delete');
});
