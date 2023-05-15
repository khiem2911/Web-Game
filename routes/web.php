<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;


Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('users', [CustomAuthController::class, 'users'])->name('User'); 
Route::get('image', [CustomAuthController::class, 'image'])->name('Image'); 
Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('login', function () {
    return view('login');
})->name('login');
Route::get('register', function () {
    return view('register');
})->name('register');
Route::get('cart', function () {
    return view('cart');
})->name('cart');
Route::get('newgame', function () {
    return view('newgame');
})->name('newgame');
Route::get('topgames', function () {
    return view('topgames');
})->name('topgames');
Route::get('salegames', function () {
    return view('salegames');
})->name('salegames');
Route::get('admin', function () {
    return view('admin');
})->name('admin');



