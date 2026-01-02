<?php


use App\Http\Controllers\Api\Admin\AdminAuthController;
use App\Http\Controllers\Api\Admin\CakeController as AdminCakeController;
use App\Http\Controllers\Api\Admin\CategoryController;
use App\Http\Controllers\Api\Admin\ContactController;
use App\Http\Controllers\Api\Admin\OrderController;
use App\Http\Controllers\CakeController as FrontCakeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Home and static pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/contact', [PageController::class, 'contact'])->name('contact'); // GET for showing form
Route::post('/contact', [PageController::class, 'contactSubmit'])->name('contact.submit'); // POST for submitting form
Route::view('/about', 'about')->name('about');

// Cakes
Route::get('/cakes/{category?}', [FrontCakeController::class, 'index'])
    ->name('frontend.cakes.index')
    ->where('category', 'all|regular|customized|wedding');





Route::get('/ajax-search', [FrontCakeController::class, 'ajaxSearch'])->name('ajax.search');
Route::get('/cakes/search', [FrontCakeController::class, 'search'])->name('frontend.cakes.search');
Route::get('/cake/{id}', [FrontCakeController::class, 'show'])->name('frontend.cakes.show');
// Cart
//Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
//Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
//
//// Checkout
//Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
//Route::post('/checkout', [CheckoutController::class, 'placeOrder'])->name('checkout.store');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::put('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/checkout-success', [CheckoutController::class, 'success'])->name('order.success');

/*
|--------------------------------------------------------------------------
| ADMIN AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'loginPost'])->name('admin.loginPost');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

/*
|--------------------------------------------------------------------------
| ADMIN PANEL ROUTES (prefix: admin)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        if (!session()->get('isAdmin')) {
            return redirect()->route('admin.login')->withErrors(['You must login first']);
        }
        return view('admin.dashboard');
    })->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | Cakes CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/cakes', [AdminCakeController::class, 'index'])->name('admin.cakes.index');
    Route::get('/cakes/create', [AdminCakeController::class, 'create'])->name('admin.cakes.create');
    Route::post('/cakes', [AdminCakeController::class, 'store'])->name('admin.cakes.store');
    Route::get('/cakes/{cake}/edit', [AdminCakeController::class, 'edit'])->name('admin.cakes.edit');
    Route::put('/cakes/{cake}', [AdminCakeController::class, 'update'])->name('admin.cakes.update');
    Route::delete('/cakes/{cake}', [AdminCakeController::class, 'destroy'])->name('admin.cakes.destroy');

    /*
    |--------------------------------------------------------------------------
    | Categories CRUD
    |--------------------------------------------------------------------------
    */
    Route::resource('categories', CategoryController::class, ['as' => 'admin']);
    Route::get('categories/{id}/cakes', [CategoryController::class, 'cakesByCategory'])
        ->name('admin.categories.cakes');

    /*
    |--------------------------------------------------------------------------
    | Orders CRUD
    |--------------------------------------------------------------------------
    */
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('admin.orders.show');
    Route::put('/orders/{id}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/orders/{id}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    /*
    |--------------------------------------------------------------------------
    | Contacts CRUD (Admin)
    |--------------------------------------------------------------------------
    */
    Route::get('contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
    Route::get('contacts/{id}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});
