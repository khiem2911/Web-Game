<?php
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;

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

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('registration', function () {
    return view('registration');
});
Route::get('comt', [CustomAuthController::class, 'getcomment'])->name('coment');
Route::delete('/destroylove/{id}', [CustomAuthController::class, 'destroylove'])->name('destroylove'); 
Route::post('comments', [CustomAuthController::class,'store'])->name('store');;
Route::get('favourite', [CustomAuthController::class, 'getFavourite'])->name('favourite');
Route::get('users', [CustomAuthController::class, 'users'])->name('User'); 
Route::get('allgames', [CustomAuthController::class, 'getAll'])->name('allgames'); 
Route::get('topgames', [CustomAuthController::class, 'getTopGames'])->name('topgames'); 
Route::get('newgame', [CustomAuthController::class, 'getNewGames'])->name('newgame'); 
Route::get('salegames', [CustomAuthController::class, 'getSaleGames'])->name('salegames'); 
Route::get('/detail/{id}', [CustomAuthController::class, 'getDetail']);
Route::get('/catePro/{id}', [CustomAuthController::class, 'getCatePro']);
Route::post('/product', [CustomAuthController::class, 'Searchpro']);
Route::get('/detail/{id}', [CustomAuthController::class, 'getDetail'])->name("chiTiet");
Route::get('/catePro/{id}', [CustomAuthController::class, 'getCatePro']);
Route::get('/add/{id}', [CustomAuthController::class, 'addWish']) ;

Route::get('/', function () {
    return view('Pages.welcome');
})->name('welcome');
Route::get('register', function () {
    return view('Pages.register');
})->name('register');
Route::get('cart', function () {
    return view('Pages.cart');
})->name('cart');


//Code cua Bao
Route::get('/addCart/{idCart}', [CustomAuthController::class, 'addCart']);
Route::get('/viewCart', [CustomAuthController::class, 'viewCart']);
Route::get('/deleteCart/{idCart}', [CustomAuthController::class, 'DeleteItemCart']);
Route::get('/pay', [CustomAuthController::class, 'PayCart']);
Route::get('/ViewUser', [CustomAuthController::class, 'ViewUser']);
Route::post('updateUser', [CustomAuthController::class, 'updateUser'])->name('updateUser');
Route::get('viewHistory', [CustomAuthController::class, 'viewHistory']);
Route::get('admin', [CustomAuthController::class, 'userNew'])->name('admin');
Route::post('custom-User', [CustomAuthController::class, 'customUser'])->name('custom.user');
Route::get('edit-User/{uid}', [CustomAuthController::class, 'editUser'])->name('edit.user');
Route::put('update-User/{uid}', [CustomAuthController::class, 'update'])->name('custom.update');
Route::delete('destroy/{uid}', [CustomAuthController::class, 'destroy'])->name('user.destroy');
Route::get('product', [CustomAuthController::class, 'productNew'])->name('product');
Route::get('create-Product', [CustomAuthController::class, 'createProduct'])->name('create.product');
Route::post('custom-Product', [CustomAuthController::class, 'customProduct'])->name('custom.products');
Route::get('edit-Product/{proId}', [CustomAuthController::class, 'editProduct'])->name('edit.product');
Route::put('update-Product/{proId}', [CustomAuthController::class, 'updateProduct'])->name('custom.updateProduct');
Route::delete('destroyProduct/{proId}', [CustomAuthController::class, 'destroyProduct'])->name('user.destroyProduct');
Route::get('category', [CustomAuthController::class, 'categoryNew'])->name('category');
Route::get('create-Category', [CustomAuthController::class, 'createCategory'])->name('create.category');
Route::post('custom-Category', [CustomAuthController::class, 'customCategory'])->name('custom.category');
Route::get('edit-Category/{cateid}', [CustomAuthController::class, 'editCategory'])->name('edit.category');
Route::put('update-Category/{cateid}', [CustomAuthController::class, 'updateCategory'])->name('custom.updateCategory');
Route::delete('destroyCategory/{cateid}', [CustomAuthController::class, 'destroyCategory'])->name('user.destroyCategory');
Route::get('user-New', [CustomAuthController::class, 'userNew'])->name('admin');
Route::get('create-User', [CustomAuthController::class, 'createUser'])->name('create.user');
Route::post('custom-User', [CustomAuthController::class, 'customUser'])->name('custom.user');
Route::get('edit-User/{uid}', [CustomAuthController::class, 'editUser'])->name('edit.user');
Route::put('update-User/{uid}', [CustomAuthController::class, 'update'])->name('custom.update');
Route::delete('destroy/{uid}', [CustomAuthController::class, 'destroy'])->name('user.destroy');
Route::get('topsell', [CustomAuthController::class, 'topSell'])->name('topsell.product');
Route::get('seachProduct', [CustomAuthController::class, 'Searchpro'])->name('search.product');
Route::get('searchAdmin', [CustomAuthController::class, 'searchAdmin'])->name('searchAdmin');
Route::get('product-Statistics', [CustomAuthController::class, 'statistics'])->name('statistics.product');
Route::get('product', [CustomAuthController::class, 'productNew'])->name('product');
Route::get('create-Product', [CustomAuthController::class, 'createProduct'])->name('create.product');
Route::post('custom-Product', [CustomAuthController::class, 'customProduct'])->name('custom.products');
Route::get('edit-Product/{proId}', [CustomAuthController::class, 'editProduct'])->name('edit.product');
Route::put('update-Product/{proId}', [CustomAuthController::class, 'updateProduct'])->name('custom.updateProduct');
Route::delete('destroyProduct/{proId}', [CustomAuthController::class, 'destroyProduct'])->name('user.destroyProduct');
Route::get('category', [CustomAuthController::class, 'categoryNew'])->name('category');
Route::get('create-Category', [CustomAuthController::class, 'createCategory'])->name('create.category');
Route::post('custom-Category', [CustomAuthController::class, 'customCategory'])->name('custom.category');
Route::get('edit-Category/{cateid}', [CustomAuthController::class, 'editCategory'])->name('edit.category');
Route::put('update-Category/{cateid}', [CustomAuthController::class, 'updateCategory'])->name('custom.updateCategory');
Route::delete('destroyCategory/{cateid}', [CustomAuthController::class, 'destroyCategory'])->name('user.destroyCategory');








Route::get('/test', [CustomAuthController::class, 'test']) ;
