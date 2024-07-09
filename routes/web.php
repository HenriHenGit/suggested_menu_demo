<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminFoodController;
use App\Http\Controllers\AdminIngredientController;
use App\Http\Controllers\UserFoodController;
use App\Http\Controllers\UserMenuController;
use App\Http\Controllers\UserDisplayController;
Route::get('/', function () {
    return view('home');
});
// Đăng nhập tài khoản admin
Route::get('/adminLogin', [AdminController::class, 'login'])->name('adminLogin.login');
Route::post('/adminLogin', [AdminController::class, 'checkLogin'])->name('adminLogin.checkLogin');

// Đăng xuất tài khoản admin
Route::post('/logoutAdmin', [AdminController::class, 'logout'])->name('logoutAdmin.logout');

// Các chức năng của admin
Route::middleware('auth_admin')->prefix('admin')->group(function () {
    Route::prefix('foods')->group(function () {
        Route::get('/', [AdminFoodController::class, 'index'])->name('admin.foods.index');
        Route::get('/showIngredient/{id}', [AdminFoodController::class, 'showIngredient'])->name('foods.showIngredient');
        Route::post('/addIngredient/{id}', [AdminFoodController::class, 'addIngredient'])->name('foods.addIngredient');
        Route::get('/show/{id}', [AdminFoodController::class, 'show'])->name('admin.foods.show');
        Route::get('/create', [AdminFoodController::class, 'create'])->name('admin.foods.create');
        Route::post('/store', [AdminFoodController::class, 'store'])->name('admin.foods.store');
        Route::get('/edit/{id}', [AdminFoodController::class, 'edit'])->name('admin.foods.edit');
        Route::post('/update/{id}', [AdminFoodController::class, 'update'])->name('admin.foods.update');
        Route::get('/delete/{id}', [AdminFoodController::class, 'delete'])->name('admin.foods.delete');
    });
    Route::prefix('ingredients')->group(function () {
        Route::get('/', [AdminIngredientController::class, 'index'])->name('admin.ingredients.index');
        Route::get('/show/{id}', [AdminIngredientController::class, 'show'])->name('admin.ingredients.show');
        Route::get('/create', [AdminIngredientController::class, 'create'])->name('admin.ingredients.create');
        Route::post('/store', [AdminIngredientController::class, 'store'])->name('admin.ingredients.store');
        Route::get('/edit/{id}', [AdminIngredientController::class, 'edit'])->name('admin.ingredients.edit');
        Route::post('/update/{id}', [AdminIngredientController::class, 'update'])->name('admin.ingredients.update');
        Route::get('/delete/{id}', [AdminIngredientController::class, 'delete'])->name('admin.ingredients.delete');
    });
});

// Đăng nhập tài khoản user
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'store'])->name('login.store');

// Đăng kí tài khoản user
Route::get('/r', [UserController::class, 'rIndex'])->name('register.index');
Route::post('/register', [UserController::class, 'rStore'])->name('register.store');

// Đăng xuất tài khoản user
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Các chức năng của user
Route::middleware('auth_user')->prefix('user')->group(function () {
    Route::prefix('foods')->group(function () {
        Route::get('/', [UserFoodController::class, 'index'])->name('foods.index');
        Route::get('/show/{id}', [UserFoodController::class, 'show'])->name('foods.show');
    });
    Route::prefix('menus')->group(function () {
        Route::get('/', [UserMenuController::class, 'index'])->name('menus.index');
        Route::post('/update', [UserMenuController::class, 'update'])->name('menus.update');
        Route::post('/store', [UserMenuController::class, 'store'])->name('menus.store');
    });
    Route::prefix('display')->group(function () {
        Route::get('/', [UserDisplayController::class, 'index'])->name('display.index');
    });
});