<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/guest', function () {
    return view('guest');
});


Route::get('/select-role/{role}', function ($role) {
    if (!in_array($role, ['guest', 'admin', 'super_admin'])) {
        abort(403);
    }

   
    Auth::loginUsingId(1); 
    
    // Update user role in database
    $user = Auth::user();
    $user->role = $role;
    $user->save();
    if ($role === 'guest') {
        return redirect('/guest');
    }
    return redirect()->route('categories.index');
});

Route::middleware(['auth'])->group(function () {
    // Categories by both admin and super_admin
    Route::get('categories', [CategoryController::class, 'index'])
        ->name('categories.index')
        ->middleware('can:viewAny,App\Models\Category');

    // Products just whoo can edit is superadmin
    Route::resource('products', ProductController::class)
        ->middleware('can:viewAny,App\Models\Product');

    //  CRUD just  super_admin only 
    Route::resource('categories', CategoryController::class)
        ->except(['index'])
        ->middleware('can:create,App\Models\Category');
});

