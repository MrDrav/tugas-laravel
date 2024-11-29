<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin_contacts', [AdminContactController::class, 'index']);
Route::get('/admin_contacts/delete/{id}', [AdminContactController::class, 'delete']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/admin_page', [AdminPageController::class, 'index'])->name('admin_page');

Route::get('/admin_products', [AdminProductController::class, 'index'])->name('admin_products');
Route::post('/admin_products', [AdminProductController::class, 'store']);
Route::get('/admin_products/delete/{id}', [AdminProductController::class, 'destroy']);
Route::get('/admin_products/edit/{id}', [AdminProductController::class, 'edit']);
Route::post('/admin_products/update/{id}', [AdminProductController::class, 'update']);

Route::get('/admin_orders', [AdminOrderController::class, 'index'])->name('admin_orders');
Route::post('/admin_orders/update', [AdminOrderController::class, 'update']);
Route::get('/admin_orders/delete/{id}', [AdminOrderController::class, 'destroy']);

Route::get('/admin_users', [AdminUserController::class, 'index'])->name('admin_users');
Route::get('/admin_users/delete/{id}', [AdminUserController::class, 'destroy']);
Route::get('/admin_users/edit/{id}', [AdminUserController::class, 'edit']);
Route::post('/admin_users/update/{id}', [AdminUserController::class, 'update']);

Route::get('/orders/total-pending', [AuthController::class, 'getTotalPendingOrders'])->name('orders.total_pending');
Route::get('/products/total', [ProductController::class, 'getTotalProducts'])->name('products.total');
Route::get('/messages/total', [AuthController::class, 'getTotalMessages'])->name('messages.total');
