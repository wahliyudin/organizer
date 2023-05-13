<?php

use App\Http\Controllers\CustomerController;
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
});
