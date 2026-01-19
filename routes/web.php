<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SimpleAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

// here is the routes with - no middleware need
Route::get('/login', [SimpleAuthController::class, 'showLogin'])->name('simple.login');
Route::post('/login', [SimpleAuthController::class, 'login'])->name('login.post'); // ADD NAME!

Route::post('/logout', [SimpleAuthController::class, 'logout'])->name('simple.logout');

Route::get('/', function () {
    return redirect()->route('simple.login');
});

// for  admin  GROUPED with middleware
Route::middleware(['admin'])->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
