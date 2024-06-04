<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/categories', [HomeController::class,'categories'])->name('frontend.categories');
Route::get('products/{slug}', [HomeController::class,'categoryProducts'])->name('frontend.categoryProducts');
Route::get('category/{cat_slug}/product/{prod_slug}', [HomeController::class,'showProduct'])->name('frontend.showProduct');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->middleware(['admin'])->group(function() {
    Route::get('/dashboard',AdminController::class)->name('admin.dashboard');
    Route::resource('categories',CategoryController::class);
    Route::resource('products',ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('carts',CartController::class);
    Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
