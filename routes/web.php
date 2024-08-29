<?php

use App\Http\Controllers\Admin\AkunController;
use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\Admin\PaketRentalController;
use App\Http\Controllers\Admin\TransaksiPaketAdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\LandingPageController;
use App\Http\Controllers\Customer\TransaksiPaketController;
use App\Http\Controllers\Driver\DriverController;
use App\Http\Controllers\Owner\OwnerController;
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

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/term-condition', function () {
    return view('term-condition');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/', [LandingPageController::class, 'landingpage']);
Route::get('/paket-wisata', [LandingPageController::class, 'paketwisata']);
Route::get('/paket-mobil', [LandingPageController::class, 'mobil']);
Route::get('/landingpage-profil', [LandingPageController::class, 'index_profil']);
Route::get('/tentangkami', [LandingPageController::class, 'tentangkami']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/profil', [AuthController::class, 'profil']);
Route::post('/profil/{id}', [AuthController::class, 'profile_update']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login-post', [AuthController::class, 'postlogin']);
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('register-post', [AuthController::class, 'postregister']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LandingPageController::class, 'dashboard']);
});
Route::middleware(['role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::resource('mobil', MobilController::class);
        Route::get('mobil/{id}/delete', [MobilController::class, 'destroy']);

        Route::resource('paketrental', PaketRentalController::class);
        Route::get('paketrental/{id}/delete', [PaketRentalController::class, 'destroy']);

        Route::resource('akun', AkunController::class);
        Route::get('akun/{id}/delete', [AkunController::class, 'destroy']);
        Route::get('transaksi-paket', [TransaksiPaketAdminController::class, 'index']);
        Route::put('cari-driver/{id_transaksi}', [TransaksiPaketAdminController::class, 'pilih_driver']);
        

    });
});

Route::middleware(['role:owner'])->group(function () {

    Route::prefix('owner')->group(function () {
        Route::get('laporan-kerusakan', [OwnerController::class, 'list_laporan']);

    });
});
Route::middleware(['role:driver'])->group(function () {

    Route::prefix('driver')->group(function () {
        Route::get('transaksi-paket', [DriverController::class, 'transaksi_rental']);
        Route::put('status-pengantaran/{id_transaksi}', [DriverController::class, 'selesai']);
        Route::get('laporan-kerusakan/{id}', [DriverController::class, 'create_laporan']);
        Route::post('postlaporan-kerusakan', [DriverController::class, 'store_laporan']);
        Route::get('laporan-kerusakan', [DriverController::class, 'list_laporan']);
        


    });
});
Route::middleware(['role:customer'])->group(function () {

    Route::prefix('customer')->group(function () {
    Route::get('/detail-mobil/{id}', [LandingPageController::class, 'detail_mobil']);
    Route::get('/detail-paket/{id}', [LandingPageController::class, 'detail_paket']);
    Route::post('create-transaksi-paket', [TransaksiPaketController::class, 'store']);
    Route::get('pemesanan/{id}', [TransaksiPaketController::class, 'pemesanan']);
    Route::get('cancel-pemesanan/{id}', [TransaksiPaketController::class, 'cancel_pemesanan']);
    Route::get('transaksi-paket', [TransaksiPaketController::class, 'index']);
    Route::get('transaksi-paket', [TransaksiPaketController::class, 'index']);


        
    });
});
