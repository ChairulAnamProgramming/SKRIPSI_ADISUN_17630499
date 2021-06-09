<?php

use App\Http\Controllers\Page\BarnController;
use App\Http\Controllers\Page\BarnManagerController;
use App\Http\Controllers\Page\FarmerController;
use App\Http\Controllers\Page\FarmerGroupController;
use App\Http\Controllers\Page\FoodItemController;
use App\Http\Controllers\Pages\ChartController;
use App\Http\Controllers\Pages\HomeController;
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
    Route::get('barnManager', [BarnManagerController::class, 'index'])->name('barnManager.index');
});
Route::get('foodItemByCategories/{id}', [HomeController::class, 'foodItemByCategories'])->name('home.foodItemByCategories');
Route::get('chart', [ChartController::class, 'index'])->name('chart.index');
