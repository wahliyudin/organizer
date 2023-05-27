<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JenisAkunController;
use App\Http\Controllers\PerkiloController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;
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
    if (auth()->guest()) {
        return to_route('login');
    }
    return to_route('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('customers', [CustomerController::class, 'index'])->name('customer.index');
    Route::post('customers/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::post('customers/{customer:kode}/edit', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('customers/{customer:kode}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::delete('customers/{customer:kode}/destroy', [CustomerController::class, 'destroy'])->name('customer.destroy');
    Route::delete('customers/destroys', [CustomerController::class, 'destroys'])->name('customer.destroys');

    Route::get('perkilos', [PerkiloController::class, 'index'])->name('perkilo.index');
    Route::post('perkilos/store', [PerkiloController::class, 'store'])->name('perkilo.store');
    Route::post('perkilos/{perkilo:kode}/edit', [PerkiloController::class, 'edit'])->name('perkilo.edit');
    Route::post('perkilos/{perkilo:kode}/update', [PerkiloController::class, 'update'])->name('perkilo.update');
    Route::delete('perkilos/{perkilo:kode}/destroy', [PerkiloController::class, 'destroy'])->name('perkilo.destroy');
    Route::delete('perkilos/destroys', [PerkiloController::class, 'destroys'])->name('perkilo.destroys');

    Route::get('jenis-akuns', [JenisAkunController::class, 'index'])->name('jenis-akun.index');
    Route::post('jenis-akuns/store', [JenisAkunController::class, 'store'])->name('jenis-akun.store');
    Route::post('jenis-akuns/{jenisAkun:kode}/edit', [JenisAkunController::class, 'edit'])->name('jenis-akun.edit');
    Route::post('jenis-akuns/{jenisAkun:kode}/update', [JenisAkunController::class, 'update'])->name('jenis-akun.update');
    Route::delete('jenis-akuns/{jenisAkun:kode}/destroy', [JenisAkunController::class, 'destroy'])->name('jenis-akun.destroy');
    Route::delete('jenis-akuns/destroys', [JenisAkunController::class, 'destroys'])->name('perkilo.destroys');

    Route::get('akuns', [AkunController::class, 'index'])->name('akun.index');
    Route::post('akuns/store', [AkunController::class, 'store'])->name('akun.store');
    Route::post('akuns/{akun:kode}/edit', [AkunController::class, 'edit'])->name('akun.edit');
    Route::post('akuns/{akun:kode}/update', [AkunController::class, 'update'])->name('akun.update');
    Route::delete('akuns/{akun:kode}/destroy', [AkunController::class, 'destroy'])->name('akun.destroy');
    Route::delete('akuns/destroys', [AkunController::class, 'destroys'])->name('perkilo.destroys');

    Route::get('pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::post('pesanan/{customer}/customer', [PesananController::class, 'customer'])->name('pesanan.customer');
    Route::post('pesanan/{perkilo}/paket', [PesananController::class, 'paket'])->name('pesanan.paket');
    Route::post('pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');
    Route::post('pesanan/{pesanan}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
    Route::post('pesanan/{pesanan:kode}/update', [PesananController::class, 'update'])->name('pesanan.update');
    Route::delete('pesanan/{pesanan}/destroy', [PesananController::class, 'destroy'])->name('pesanan.destroy');
});
