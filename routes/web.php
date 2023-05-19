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

Route::get('/', [CustomAuthController::class, 'welcome']);
Route::get('user-New', [CustomAuthController::class, 'userNew'])->name('admin');
Route::get('create-User', [CustomAuthController::class, 'createUser'])->name('create.user');
Route::post('custom-User', [CustomAuthController::class, 'customUser'])->name('custom.user');
Route::get('edit-User/{uid}', [CustomAuthController::class, 'editUser'])->name('edit.user');
Route::put('update-User/{uid}', [CustomAuthController::class, 'update'])->name('custom.update');
Route::delete('destroy/{uid}', [CustomAuthController::class, 'destroy'])->name('user.destroy');
Route::get('topsell', [CustomAuthController::class, 'topSell'])->name('topsell.product');
Route::get('seachProduct', [CustomAuthController::class, 'search'])->name('search.product');
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







