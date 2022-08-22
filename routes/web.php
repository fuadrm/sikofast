<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\BahanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProgresController;
use App\Http\Controllers\ProduksiController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BahanBakuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//group middleware
Route::group(['auth'],function () {
    Route::get('/', [HomeController::class, 'index'])->middleware('auth');

    Route::get('/laporan', function () {
        return view('laporan/laporan', [
            "title" => "Laporan"
        ]);
    });

    Route::get('/produksi', [ProduksiController::class, 'index'])->name('produksi');
    Route::post('/produksi/status', [ProduksiController::class, 'update_status'])->name('produksi.status');
    
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
    Route::get('/pemesanan/add', [PemesananController::class, 'add']);
    Route::post('/pemesanan/insert', [PemesananController::class, 'insert']);
    Route::delete('/pemesanan/destroy/{id}', [PemesananController::class, 'destroy']);
    Route::get('/pemesanan/edit/{id}', [PemesananController::class, 'edit']);
    Route::put('/pemesanan/update/{id}', [PemesananController::class, 'update']);
    Route::get('/pemesanan/detail/{id}', [PemesananController::class, 'detail']);
    Route::get('/pemesanan/generateExcel', [PemesananController::class, 'generateExcel']);

    Route::get('/bahan', [BahanController::class, 'index'])->name('bahan');
    Route::get('/bahan/add', [BahanController::class, 'add']);
    Route::post('/bahan/insert', [BahanController::class, 'insert']);
    Route::delete('/bahan/destroy/{id}', [BahanController::class, 'destroy']);
    Route::get('/bahan/edit/{id}', [BahanController::class, 'edit']);
    Route::put('/bahan/update/{id}', [BahanController::class, 'update']);

    Route::get('/tipe_order', [TipeController::class, 'index'])->name('tipe_order');
    Route::get('/tipe_order/add', [TipeController::class, 'add']);
    Route::post('/tipe_order/insert', [TipeController::class, 'insert']);
    Route::delete('/tipe_order/destroy/{id}', [TipeController::class, 'destroy']);
    Route::get('/tipe_order/edit/{id}', [TipeController::class, 'edit']);
    Route::put('/tipe_order/update/{id}', [TipeController::class, 'update']);

    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/pembayaran/lunas', [PembayaranController::class, 'lunas']);
    Route::get('/pembayaran/dp', [PembayaranController::class, 'dp']);
    Route::get('/pembayaran/add', [PembayaranController::class, 'add']);
    Route::post('/pembayaran/getDetailNoPo', [PembayaranController::class, 'getDetailNoPo']);
    Route::post('/pembayaran/insert', [PembayaranController::class, 'insert']);
    Route::get('/pembayaran/detail/{id}', [PembayaranController::class, 'detail']);
    Route::get('/pembayaran/detail_lunas/{id}', [PembayaranController::class, 'detail_lunas']);
    Route::get('/pembayaran/detail_dp/{id}', [PembayaranController::class, 'detail_dp']);
    Route::delete('/pembayaran/destroy/{id}', [PembayaranController::class, 'destroy']);
    Route::get('/pembayaran/edit/{id}', [PembayaranController::class, 'edit']);
    Route::put('/pembayaraan/update/{model}', [PembayaranController::class, 'update'])->name('pembayaran.update');
    Route::get('/pembayaran/status/{id}', [PembayaranController::class, 'status']);
    Route::get('/pembayaran/generateExcel', [PembayaranController::class, 'generateExcel']);

    Route::get('/bahanbaku', [BahanBakuController::class, 'index'])->name('bahanbaku');
    Route::get('/bahanbaku/pemenuhan', [BahanBakuController::class, 'pemenuhan']);
    Route::get('/bahanbaku/add', [BahanBakuController::class, 'add']);
    Route::post('/bahanbaku/insert', [BahanBakuController::class, 'insert'])->name('bahanbaku.insert');
    Route::get('/bahanbaku/detail/{id}', [BahanBakuController::class, 'detail']);
    Route::get('/bahanbaku/detail_pemenuhan/{id}', [BahanBakuController::class, 'detail_pemenuhan']);
    Route::delete('/bahanbaku/destroy/{id}', [BahanBakuController::class, 'destroy']);
    Route::get('/bahanbaku/edit/{id}', [BahanBakuController::class, 'edit']);
    Route::put('/bahanbaku/update/{id}', [BahanBakuController::class, 'update'])->name('bahanbaku.update');
    Route::get('/bahanbaku/status/{id}', [BahanBakuController::class, 'status']);
    Route::get('/bahanbaku/generateExcel', [BahanBakuController::class, 'generateExcel']);

});
// Route::get('/', [HomeController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// Route::get('/data', function () {
//     return view('data', [
//         "title" => "Data"
//     ]);
// });

