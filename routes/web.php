<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('users', [CustomAuthController::class, 'users'])->name('User'); 
Route::get('allgames', [CustomAuthController::class, 'getAll'])->name('allgames'); 
Route::get('topgames', [CustomAuthController::class, 'getTopGames'])->name('topgames'); 
Route::get('newgame', [CustomAuthController::class, 'getNewGames'])->name('newgame'); 
Route::get('salegames', [CustomAuthController::class, 'getSaleGames'])->name('salegames'); 
Route::get('/detail/{id}', [CustomAuthController::class, 'getDetail']);
Route::get('/catePro/{id}', [CustomAuthController::class, 'getCatePro']);
Route::post('/product', [CustomAuthController::class, 'store']);
Route::get('/', function () {
    return view('Pages.welcome');
})->name('welcome');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');
Route::get('cart', function () {
    return view('Pages.cart');
})->name('cart');

Route::get('admin', function () {
    return view('admin');
})->name('admin');



