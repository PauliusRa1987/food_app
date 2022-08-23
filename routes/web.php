<?php

use App\Http\Controllers\DishController;
use App\Http\Controllers\MeniuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RestaurantController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/', [OrderController::class, 'index'])->name('front-page')->middleware('roleP:guest');

Route::prefix('order')->name('order-')->group(function () {
    Route::get('/create/{meniu}', [OrderController::class, 'create'])->name('create')->middleware('roleP:user');
    Route::post('store/{dish}', [OrderController::class, 'store'])->name('store')->middleware('roleP:user');
    Route::get('edit', [OrderController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{order}', [OrderController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{order}', [OrderController::class, 'destroy'])->name('destroy');
    Route::get('show/{id}', [OrderController::class, 'show'])->name('show')->middleware('roleP:user');
});



Route::prefix('restaurant')->name('restaurant-')->group(function () {
    Route::get('', [RestaurantController::class, 'index'])->name('index')->middleware('roleP:guest');
    Route::get('/create', [RestaurantController::class, 'create'])->name('create')->middleware('roleP:admin');
    Route::post('store', [RestaurantController::class, 'store'])->name('store')->middleware('roleP:admin');
    Route::get('edit/{restaurant}', [RestaurantController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{restaurant}', [RestaurantController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{restaurant}', [RestaurantController::class, 'destroy'])->name('destroy')->middleware('roleP:admin');
});


Route::prefix('meniu')->name('meniu-')->group(function () {
    Route::get('', [MeniuController::class, 'index'])->name('index')->middleware('roleP:guest');
    Route::get('/create', [MeniuController::class, 'create'])->name('create')->middleware('roleP:admin');
    Route::post('store', [MeniuController::class, 'store'])->name('store')->middleware('roleP:admin');
    Route::get('edit/{meniu}', [MeniuController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{meniu}', [MeniuController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{meniu}', [MeniuController::class, 'destroy'])->name('destroy')->middleware('roleP:admin');
});

Route::prefix('dish')->name('dish-')->group(function () {
    Route::get('', [DishController::class, 'index'])->name('index')->middleware('roleP:admin');
    Route::get('/create', [DishController::class, 'create'])->name('create')->middleware('roleP:admin');
    Route::post('store', [DishController::class, 'store'])->name('store')->middleware('roleP:admin');
    Route::get('edit/{dish}', [DishController::class, 'edit'])->name('edit')->middleware('roleP:admin');
    Route::put('update/{dish}', [DishController::class, 'update'])->name('update')->middleware('roleP:admin');
    Route::delete('delete/{dish}', [DishController::class, 'destroy'])->name('destroy')->middleware('roleP:admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
