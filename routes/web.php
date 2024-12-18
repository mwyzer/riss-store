<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialiteController;

// Web Routes
Route::get('/', \App\Http\Controllers\Web\HomeController::class)->name('web.home.index');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'store'])->name('login.store');
    Route::post('/otp/generate', [\App\Http\Controllers\Auth\AuthOtpController::class, 'generate'])->name('otp.generate');
    Route::post('/otp/verify', [\App\Http\Controllers\Auth\AuthOtpController::class, 'verify'])->name('otp.verify');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', \App\Http\Controllers\Auth\LogoutController::class)->name('logout');

    // Account Routes
    Route::prefix('account')->name('account.')->group(function () {
        Route::get('/dashboard', \App\Http\Controllers\Account\DashboardController::class)->name('dashboard');

        Route::middleware('permission:permissions.index')->group(function () {
            Route::get('/permissions', \App\Http\Controllers\Account\PermissionController::class)->name('permissions.index');
        });

        Route::resource('/roles', \App\Http\Controllers\Account\RoleController::class)
            ->middleware('permission:roles.index|roles.create|roles.edit|roles.delete');

        Route::resource('/users', \App\Http\Controllers\Account\UserController::class)
            ->middleware('permission:users.index|users.create|users.edit|users.delete');

        Route::resource('/colors', \App\Http\Controllers\Account\ColorController::class)
            ->middleware('permission:colors.index|colors.create|colors.edit|colors.delete');

        Route::resource('/warnas', \App\Http\Controllers\Account\WarnaController::class)
            ->middleware('permission:warnas.index|warnas.create|warnas.edit|warnas.delete');

        Route::resource('/categories', \App\Http\Controllers\Account\CategoryController::class)
            ->middleware('permission:categories.index|categories.create|categories.edit|categories.delete');

        Route::prefix('/products')->name('products.')->group(function () {
            Route::post('/store_image', [\App\Http\Controllers\Account\ProductController::class, 'storeImageProduct'])->name('store_image_product');
            Route::delete('/destroy_image/{id}', [\App\Http\Controllers\Account\ProductController::class, 'destroyImage'])->name('destroy_image_product');
        });

        Route::resource('/products', \App\Http\Controllers\Account\ProductController::class)
            ->middleware('permission:products.index|products.create|products.show|products.edit|products.delete');

        Route::prefix('/transactions')->name('transactions.')->middleware('permission:transactions.index|transactions.show')->group(function () {
            Route::get('/', [\App\Http\Controllers\Account\TransactionController::class, 'index'])->name('index');
            Route::get('/{invoice}', [\App\Http\Controllers\Account\TransactionController::class, 'show'])->name('show');
        });

        Route::resource('/sliders', \App\Http\Controllers\Account\SliderController::class, ['except' => ['create', 'show', 'edit', 'update']])
            ->middleware('permission:sliders.index|sliders.create|sliders.delete');

        Route::resource('/locations', \App\Http\Controllers\Account\LocationController::class)
            ->middleware('permission:locations.index|locations.create|locations.show|locations.edit|locations.delete');
    });

    // Web-Specific Routes
    Route::get('/carts', [\App\Http\Controllers\Web\CartController::class, 'index'])->name('web.carts.index');
    Route::post('/carts', [\App\Http\Controllers\Web\CartController::class, 'store'])->name('web.carts.store');
    Route::delete('/carts/{id}', [\App\Http\Controllers\Web\CartController::class, 'destroy'])->name('web.carts.destroy');

    Route::prefix('/checkouts')->name('web.checkouts.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Web\CheckoutController::class, 'index'])->name('index');
        Route::get('/cities', [\App\Http\Controllers\Web\CheckoutController::class, 'getCities'])->name('getCities');
        Route::post('/checkOngkir', [\App\Http\Controllers\Web\CheckoutController::class, 'checkOngkir'])->name('checkOngkir');
        Route::post('/', [\App\Http\Controllers\Web\CheckoutController::class, 'store'])->name('store');
    });
});

// Socialite Routes
Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

// Category Routes
Route::get('/categories', [\App\Http\Controllers\Web\CategoryController::class, 'index'])->name('web.categories.index');
Route::get('/categories/{slug}', [\App\Http\Controllers\Web\CategoryController::class, 'show'])->name('web.categories.show');

// Product Routes
Route::get('/products', [\App\Http\Controllers\Web\ProductController::class, 'index'])->name('web.products.index');
Route::get('/products/{slug}', [\App\Http\Controllers\Web\ProductController::class, 'show'])->name('web.products.show');

// OTP Routes


// Callback Route
Route::post('/callback', \App\Http\Controllers\Web\CallbackController::class)->name('web.callback');

// Search Route
Route::post('/search', \App\Http\Controllers\Web\SearchController::class)->name('web.search.index');