<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\PaymentController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\SaleProductController;
use App\Http\Controllers\API\SiteCategoryController;
use App\Http\Controllers\API\SiteController;
use Illuminate\Support\Facades\Route;

Route::post('login', [LoginController::class, 'login']);
Route::post('register', RegisterController::class);
Route::middleware('api.auth')->group(function () {
        Route::middleware('role:administrator')->group(function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        Route::get('user', [LoginController::class, 'details']);
        Route::apiResource('product', ProductController::class);
        Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::apiResource('category', CategoryController::class);
        Route::get('category/show/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::apiResource('payment', PaymentController::class);
        Route::get('payment/show/{id}', [PaymentController::class, 'show'])->name('payment.show');
        Route::put('payment/update/{id}', [PaymentController::class, 'update'])->name('payment.update');
        Route::delete('payment/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
        Route::apiResource('sale', SaleController::class);
        Route::get('sale/show/{id}', [SaleController::class, 'show'])->name('sale.show');
        Route::put('sale/update/{id}', [SaleController::class, 'update'])->name('sale.update');
        Route::delete('sale/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');
        Route::apiResource('saleProduct', SaleProductController::class);
        Route::get('saleProduct/show/{id}', [SaleProductController::class, 'show'])->name('saleProduct.show');
        Route::put('saleProduct/update/{id}', [SaleProductController::class, 'update'])->name('saleProduct.update');
        Route::delete('saleProduct/destroy/{id}', [SaleProductController::class, 'destroy'])->name('saleProduct.destroy');
        Route::apiResource('site', SiteController::class);
        Route::get('site/show/{id}', [SiteController::class, 'show'])->name('site.show');
        Route::put('site/update/{id}', [SiteController::class, 'update'])->name('site.update');
        Route::delete('site/destroy/{id}', [SiteController::class, 'destroy'])->name('site.destroy');
        Route::apiResource('siteCategory', SiteCategoryController::class);
        Route::get('siteCategory/show/{id}', [SiteCategoryController::class, 'show'])->name('siteCategory.show');
        Route::put('siteCategory/update/{id}', [SiteCategoryController::class, 'update'])->name('siteCategory.update');
        Route::delete('siteCategory/destroy/{id}', [SiteCategoryController::class, 'destroy'])->name('siteCategory.destroy');

    });
});
