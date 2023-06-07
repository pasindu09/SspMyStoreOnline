<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredSellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController2;

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
    return view('welcome');
})->name('welcome');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/dashboard', [HomeController::class, "index"])->name('dashboard');



route::get('/redirects', [HomeController::class, "index"])->middleware('auth');

//define auth:sellers , auth:admin
Route::resource("products", ProductController::class)->middleware('auth:');



Route::get('/register/seller', [RegisteredSellerController::class, 'createSeller'])
    ->middleware('guest')
    ->name('register.seller');


Route::post('/register/seller', [RegisteredSellerController::class, 'store'])
    ->middleware('guest')
    ->name('seller.register');

    Route::get('/seller/product/create', function () {
        return view('seller.create');
    })->middleware(['auth',])
    ->name('productcreate');


//username--Admin1@gmail.com    password-12345678
route::get('/admin', [HomeController::class, "index"])->middleware('auth');



//define auth:sellers , auth:admin
Route::resource("users", AdminController::class)->middleware('auth');
Route::resource("usersseller", AdminController2::class)->middleware('auth');

/*Route::get('/redirects', [AdminController::class, 'index']);*/
