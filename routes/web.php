<?php

use App\Http\Controllers\Page\BarnController;
use App\Http\Controllers\Page\BarnManagerController;
use App\Http\Controllers\Page\FarmerController;
use App\Http\Controllers\Page\FarmerGroupController;
use App\Http\Controllers\Page\FoodItemController;
use App\Http\Controllers\Pages\CartController;
use App\Http\Controllers\Pages\ChartController;
use App\Http\Controllers\Pages\CheckoutController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\ReportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::resource('farmer', FarmerController::class);
    Route::resource('farmerGroup', FarmerGroupController::class);
    Route::resource('barn', BarnController::class);
    Route::resource('foodItem', FoodItemController::class);
    Route::resource('cart', CartController::class);
    Route::resource('checkout', CheckoutController::class);
    Route::get('checkout-admin', [CheckoutController::class, 'admin'])->name('checkout.admin');
    Route::get('barnManager', [BarnManagerController::class, 'index'])->name('barnManager.index');


    // REPORT
    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::post('report/stok-pangan', [ReportController::class, 'stokPangan'])->name('report.stok-pangan');
    Route::post('report/stok-pangan-perlumbung', [ReportController::class, 'stokPanganPerlumbung'])->name('report.stok-pangan-perlumbung');
    Route::post('report/pesanan-user', [ReportController::class, 'pesananUser'])->name('report.pesanan-user');
    Route::post('report/pesanan', [ReportController::class, 'pesanan'])->name('report.pesanan');
    Route::post('report/pengelola-lumbung', [ReportController::class, 'pengelolaLumbung'])->name('report.pengelola-lumbung');
    Route::post('report/pesanan-pangan-terbanyak', [ReportController::class, 'pesananPanganTerbanyak'])->name('report.pesanan-pangan-terbanyak');
    Route::post('report/pesanan-pangan-belum-diterima-user', [ReportController::class, 'pesananPanganBelumDiTerima'])->name('report.pesanan-pangan-belum-diterima-user');
    Route::post('report/pesanan-pangan-belum-di-konfirmasi', [ReportController::class, 'pesananPanganBelumDiKonfirmasi'])->name('report.pesanan-pangan-belum-di-konfirmasi');
    Route::post('report/pesanan-masih-di-keranjang', [ReportController::class, 'pesananMasihDiKeranjang'])->name('report.pesanan-masih-di-keranjang');
});
Route::get('foodItemByCategories/{id}', [HomeController::class, 'foodItemByCategories'])->name('home.foodItemByCategories');
Route::get('chart', [ChartController::class, 'index'])->name('chart.index');
