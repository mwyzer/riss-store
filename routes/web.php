<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Controllers\Web\HomeController::class)->name('web.home.index');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
});

Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout')->middleware('auth');



// Account Routes
Route::middleware(['auth'])->prefix('account')->group(function () {
    Route::get('/dashboard', \App\Http\Controllers\Account\DashboardController::class)->name('account.dashboard');

    Route::middleware(['permission:permissions.index'])->group(function () {
        Route::get('/permissions', \App\Http\Controllers\Account\PermissionController::class)->name('account.permissions.index');
    });

    Route::resource('/roles', \App\Http\Controllers\Account\RoleController::class, ['as' => 'account'])
        ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

    Route::resource('/users', \App\Http\Controllers\Account\UserController::class, ['as' => 'account'])
        ->middleware('permission:users.index|users.create|users.edit|users.delete');

    Route::resource('/colors', \App\Http\Controllers\Account\ColorController::class, ['as' => 'account'])
        ->middleware('permission:colors.index|colors.create|colors.edit|colors.delete');

    Route::resource('/warnas', App\Http\Controllers\Account\WarnaController::class, ['as' => 'account'])
        ->middleware('permission:warnas.index|warnas.create|warnas.edit|warnas.delete');

    Route::resource('/categories', \App\Http\Controllers\Account\CategoryController::class, ['as' => 'account'])
        ->middleware('permission:categories.index|categories.create|categories.edit|categories.delete');

    Route::post('/products/store_image_product', [\App\Http\Controllers\Account\ProductController::class, 'storeImageProduct'])->name('account.products.store_image_product');
    Route::delete('/products/destroy_image_product/{id}', [\App\Http\Controllers\Account\ProductController::class, 'destroyImage'])->name('account.products.destroy_image_product');

    Route::resource('/products', \App\Http\Controllers\Account\ProductController::class, ['as' => 'account'])
        ->middleware('permission:products.index|products.create|products.show|products.edit|products.delete');

    Route::get('/transactions', [\App\Http\Controllers\Account\TransactionController::class, 'index'])->name('account.transactions.index')
        ->middleware('permission:transactions.index');
    Route::get('/transactions/{invoice}', [\App\Http\Controllers\Account\TransactionController::class, 'show'])->name('account.transactions.show')
        ->middleware('permission:transactions.show');

    Route::resource('/sliders', \App\Http\Controllers\Account\SliderController::class, ['as' => 'account', 'except' => ['create', 'show', 'edit', 'update']])
        ->middleware('permission:sliders.index|sliders.create|sliders.delete');

    Route::resource('/locations', \App\Http\Controllers\Account\LocationController::class, ['as' => 'account'])
        ->middleware('permission:locations.index|locations.create|locations.show|locations.edit|locations.delete');
});
// Socialite Routes
Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

// Web Routes
Route::get('/categories', [\App\Http\Controllers\Web\CategoryController::class, 'index'])->name('web.categories.index');
Route::get('/categories/{slug}', [\App\Http\Controllers\Web\CategoryController::class, 'show'])->name('web.categories.show');
Route::get('/products', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('web.products.index');
Route::get('/products/{slug}', [\App\Http\Controllers\Web\ProductController::class, 'show'])->name('web.products.show');

Route::middleware('auth')->group(function () {
    Route::get('/carts', [\App\Http\Controllers\Web\CartController::class, 'index'])->name('web.carts.index');
    Route::post('/carts', [\App\Http\Controllers\Web\CartController::class, 'store'])->name('web.carts.store');
    Route::delete('/carts/{id}', [\App\Http\Controllers\Web\CartController::class, 'destroy'])->name('web.carts.destroy');
});
