<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserProductController;
use App\Http\Controllers\OrderController;






Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('store', [UserProductController::class, 'index'])->name('user.products');
// Route::get('store', [UserProductController::class, 'index'])->name('products.index');

Route::resource('products', ProductController::class);

// Route::get('dashboard', function () {
//     return redirect()->route('products.index'); // Redirect to the store page
// })->middleware('auth');
Route::get('dashboard', function () {
    return redirect('store'); // Redirect to the store page
})->middleware('auth');

Route::post('orders', [OrderController::class, 'store'])->name('orders.store');