<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CheckoutController;

// Home & Contact
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact', [PageController::class, 'contactSubmit']);

// 🧁 Cakes
// Put the search route BEFORE the dynamic {category} route
Route::get('/cakes/search', [CakeController::class, 'search'])->name('cakes.search');
Route::get('/cakes', [CakeController::class, 'categories'])->name('cakes.categories');
Route::get('/cakes/{category}', [CakeController::class, 'index'])->name('cakes.index');
Route::get('/cake/{id}', [CakeController::class, 'show'])->name('cakes.show');

// 🛒 Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
