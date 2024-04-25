<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {
    Route::middleware('role:superadministrator')->group(function () {
        Route::get('/home', function () {
            return view('pages.dashboard');
        })->name('home');
        Route::get('/upload_product', function () {
            $categories = Category::all();
            return
                view('pages.upload_product')->with('categories', $categories);
        })->name('upload_product');

        Route::get('/sales', function () {
            $sales = Sale::all();
            return
                view('pages.sales')->with('sales', $sales);
        })->name('sales');
        Route::get('/update_product/{id}', function () {
            return
                view('pages.update_product');
        })->name('update_product');

        Route::get('/peoples', [UserController::class, 'index'])->name('peoples');
        Route::get('user/destroy/{id}', [UserController::class, 'destroy']);
        Route::post('user/store', [UserController::class, 'store'])->name('user.store');
        Route::get('user/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::get('/products', [ProductController::class, 'index'])->name('products');
        Route::get('product/destroy/{id}', [ProductController::class, 'destroy  '])->name('product.destroy');
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
        Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/update_category/{id}', [CategoryController::class, 'show'])->name('update_category');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::get('category/show/{id}', [categoryController::class, 'show'])->name('category.show');
        Route::get('sale/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy');
        Route::get('sale/show/{id}', [saleController::class, 'show'])->name('sale.show');
        Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
        Route::get('payments/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy');
        Route::get('payments/show/{id}', [PaymentController::class, 'show'])->name('payment.show');
        Route::post('payments/update/{id}', [PaymentController::class, 'edit'])->name('payment.edit');


    });
});

require __DIR__ . '/auth.php';

