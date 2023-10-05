<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisteredSellerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminController2;
use App\Http\Controllers\JoinTableController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AdressBookController;
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

Route::get('/crm', function () {
    return view('seller.crmdashboard');
})->name('crm');


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

   /* Route::get('/seller/product/create', function () {
        return view('seller.create');
    })->middleware(['auth',])
    ->name('productcreate');*/


//username--Admin1@gmail.com    password-12345678
route::get('/admin', [HomeController::class, "index"])->middleware('auth');



//define auth:sellers , auth:admin
Route::resource("users", AdminController::class)->middleware('auth');
Route::resource("usersseller", AdminController2::class)->middleware('auth');

/*Route::get('/redirects', [AdminController::class, 'index']);*/


//route::get('/join', [JoinTableController::class, "showSellerInfo"]);

//route::get('/join/{id}', [ProductController::class, "getIdImage"]);

//productview route
Route::get('/productview/{item}/{user}',[ProductController::class, "productview"])->name('product.view');
Route::post('/products/itemremove/{user}/{id}', [ProductController::class, 'quantityUpdate']);
Route::post('/products/itemadd/{user}/{id}', [ProductController::class, 'quantityAddtocart']);
Route::post('/products/itemadd2/{user}/{id}', [ProductController::class, 'quantityAddtocart2']);



Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::get('/getcreateadress', function () {
    return view('createaddressbook');
})->name('addresscreate');

Route::get('/getcreateadress', function () {
    return view('createaddressbook2');
})->name('addresscreate2');

Route::post('/createAdressBook2', [AdressBookController::class, 'createAdressBook2'])->name('createAdressBook2');

Route::post('/createAdressBook', [AdressBookController::class, 'createAdressBook'])->name('createAdressBook');


Route::get('/myaddressbook', function () {
    return view('myaddressbook');
})->name('myaddressbook');

Route::get('/myorder', function () {
    return view('Myorder');
})->name('myorder');

Route::get('/adressbookforuser', [AdressBookController::class, 'loadadreses'])->name('adressbookforuser');

