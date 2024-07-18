<?php

use App\Http\Controllers\Admin\MobilController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Customer\LandingPageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/', [LandingPageController::class, 'landingpage']);
Route::get('/landingpage-profil', [LandingPageController::class, 'index_profil']);
Route::get('/detail-berita', [LandingPageController::class, 'detailberita']);
Route::get('/detail-galeri', [LandingPageController::class, 'detailgaleri']);
Route::get('/tentangkami', [LandingPageController::class, 'tentangkami']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/profil', [AuthController::class, 'profil']);
Route::post('/profil/{id}', [AuthController::class, 'profile_update']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('login-post', [AuthController::class, 'postlogin']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [LandingPageController::class, 'dashboard']);
});
Route::middleware(['role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::resource('mobil', MobilController::class);
    });
});

Route::middleware(['role:owner'])->group(function () {

    Route::prefix('owner')->group(function () {
    });
});
Route::middleware(['role:driver'])->group(function () {

    Route::prefix('driver')->group(function () {
    });
});
Route::middleware(['role:customer'])->group(function () {

    Route::prefix('customer')->group(function () {
    });
});
