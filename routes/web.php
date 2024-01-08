<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
//     return view('index');
// });

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/shop', function () {
//     return view('index');
// });

// Route::get('/detail', function () {
//     return view('detail');
// });

// Route::get('/keranjang', function () {
//     return view('keranjang');
// });

// Route::get('/checkout', function () {
//     return view('checkout');
// });

// Route::get('/pesanan', function () {
//     return view('pesanan');
// });

// Route::get('/info', function () {
//     return view('detailPesanan');
// });

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/tambah', function () {
    return view('tambahProduk');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/input', [App\Http\Controllers\ProdukController::class, 'store'])->name('input');

Route::delete('/hapus/{id}', [App\Http\Controllers\ProdukController::class, 'destroy']);

Route::post('/ubah/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('ubah');

Route::get('/detail/{id}', [App\Http\Controllers\ProdukController::class, 'index']);

Route::post('/keranjang/{id}/{status}', [App\Http\Controllers\PesananController::class, 'store'])->name('keranjang');

Route::get('/keranjang', [App\Http\Controllers\KeranjangController::class, 'index']);

Route::post('prosesco', [App\Http\Controllers\KeranjangController::class, 'store'])->name('prosesco');

Route::get('/checkout', [App\Http\Controllers\PesananController::class, 'index']);

Route::post('/proses', [App\Http\Controllers\PesananController::class, 'proses'])->name('proses');

Route::get('/pesanan', [App\Http\Controllers\HomeController::class, 'pesanan'])->name('pesanan');

Route::get('/info/{id}', [App\Http\Controllers\PesananController::class, 'infopesanan']);

Route::post('/buynow/{id}/{status}', [App\Http\Controllers\PesananController::class, 'buy'])->name('buynow');

Route::get('/hapuskeranjang/{id}', [App\Http\Controllers\KeranjangController::class, 'destroy']);
