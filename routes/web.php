<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RedirectIfAuthenticated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([RedirectIfAuthenticated::class])->group(function () {
    Route::get('', [AdminController::class, 'index']);

    // Redirect when admin user is not authenticated
    Route::get('/login', [AdminController::class, 'index'])->name('login');
    Route::post('/login-handler', [AdminController::class, 'loginHandler'])->name(
        'login.handler'
    );

    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::post('/register-handler', [AdminController::class, 'registerHandler'])->name(
        'register.handler'
    );
});

Route::middleware('auth:admin')->group(function () {
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::group(['prefix' => 'catalog/brand'], function () {
        Route::get('', [BrandController::class, 'index'])->name('catalog.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('catalog.brand.create');
        Route::post('/create-handler', [BrandController::class, 'createHandler'])->name(
            'catalog.brand.create.handler'
        );
        Route::get('/update/{brandId}', [BrandController::class, 'update'])->name(
            'catalog.brand.update'
        );
        Route::put('/update-handler/{brandId}', [BrandController::class, 'updateHandler'])->name(
            'catalog.brand.update.handler'
        );
        Route::delete('/delete/{brandId}', [BrandController::class, 'delete'])->name(
            'catalog.brand.delete'
        );
        Route::get('/search', [BrandController::class, 'search'])->name(
            'catalog.brand.search'
        );
    });

    Route::group(['prefix' => 'catalog/category'], function () {
        Route::get('', [CategoryController::class, 'index'])->name('catalog.category.index');
        Route::get('/create', [CategoryController::class, 'create'])->name(
            'catalog.category.create'
        );
        Route::post('/create-handler', [CategoryController::class, 'createHandler'])->name(
            'catalog.category.create.handler'
        );
        Route::get('/update/{categoryId}', [CategoryController::class, 'update'])->name(
            'catalog.category.update'
        );
        Route::put('/update-handler/{categoryId}', [CategoryController::class, 'updateHandler'])->name(
            'catalog.category.update.handler'
        );
        Route::delete('/delete/{categoryId}', [CategoryController::class, 'delete'])->name(
            'catalog.category.delete'
        );
        Route::get('/search', [CategoryController::class, 'search'])->name(
            'catalog.category.search'
        );
    });

    Route::group(['prefix' => 'catalog/product'], function () {
        Route::get('', [ProductController::class, 'index'])->name('catalog.product.index');
        Route::get('/create', [ProductController::class, 'create'])->name(
            'catalog.product.create'
        );
        Route::post('/create-handler', [ProductController::class, 'createHandler'])->name(
            'catalog.product.create.handler'
        );
        Route::get('/update/{productId}', [ProductController::class, 'update'])->name(
            'catalog.product.update'
        );
        Route::put('/update-handler/{productId}', [ProductController::class, 'updateHandler'])->name(
            'catalog.product.update.handler'
        );
        Route::delete('/delete/{productId}', [ProductController::class, 'delete'])->name(
            'catalog.product.delete'
        );
        Route::get('/search', [ProductController::class, 'search'])->name(
            'catalog.product.search'
        );

        Route::get('/details/{productId}', [ProductController::class, 'showDetails'])->name(
            'catalog.product.details'
        );
        Route::post('/details/{productId}/images/create-handler', [ProductController::class, 'createImages'])->name(
            'catalog.product.details.images.create.handler'
        );
        Route::delete('/details/{productId}/images/delete/{productImageId}', [ProductController::class, 'deleteImage'])->name(
            'catalog.product.details.images.delete'
        );
    });

    Route::group(['prefix' => 'manage/customer'], function () {
        Route::get('', [CustomerController::class, 'index'])->name('manage.customer.index');
        Route::put('/update-disable-flag/{customerId}', [CustomerController::class, 'updateDisableFlag'])->name(
            'manage.customer.update-disable-flag'
        );
        Route::delete('/delete/{customerId}', [CustomerController::class, 'delete'])->name(
            'manage.customer.delete'
        );
        Route::get('/search', [CustomerController::class, 'search'])->name(
            'manage.customer.search'
        );

        Route::get('/details/{customerId}', [CustomerController::class, 'showDetails'])->name(
            'manage.customer.details'
        );
    });

    Route::group(['prefix' => 'manage/order'], function () {
        Route::get('', [OrderController::class, 'index'])->name('manage.order.index');
        Route::put('/update-order-status/{orderId}', [OrderController::class, 'updateOrderStatus'])->name(
            'manage.order.update-order-status'
        );
        Route::get('/search', [OrderController::class, 'search'])->name(
            'manage.order.search'
        );
        Route::get('/filter', [OrderController::class, 'filter'])->name(
            'manage.order.filter'
        );

        Route::get('/details/{orderId}', [OrderController::class, 'showDetails'])->name(
            'manage.order.details'
        );
    });
});
