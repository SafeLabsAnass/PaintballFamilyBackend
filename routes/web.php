<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SettingController;
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
        Route::get('/home', [DashboardController::class,'statistics' ])->name('home');
        Route::get('/home/chart', [DashboardController::class,'charts' ])->name('chart');
        Route::get('/upload_product', function () {
            $categories = Category::all();
            return
                view('pages.upload_product')->with('categories', $categories);
        })->name('upload_product');

        Route::get('/sales', [SaleController::class, 'index'])->name('sales');
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
        Route::get('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy.web');
        Route::post('product/store', [ProductController::class, 'store'])->name('product.store.web');
        Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show.web');
        Route::post('product/update/{id}', [ProductController::class, 'update'])->name('product.update.web');
        Route::get('/update_category/{id}', [CategoryController::class, 'show'])->name('update_category');
        Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('category/store', [CategoryController::class, 'store'])->name('category.store.web');
        Route::get('category/destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy.web');
        Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update.web');
        Route::get('category/show/{id}', [categoryController::class, 'show'])->name('category.show.web');
        Route::get('sale/destroy/{id}', [SaleController::class, 'destroy'])->name('sale.destroy.web');
        Route::get('sale/show/{id}', [saleController::class, 'show'])->name('sale.show.web');
        Route::post('sale/edit/{id}', [saleController::class, 'edit'])->name('sale.edit.web');
        Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
        Route::post('payments/store', [PaymentController::class, 'store'])->name('payment.store.web');
        Route::get('payments/destroy/{id}', [PaymentController::class, 'destroy'])->name('payment.destroy.web');
        Route::get('payments/show/{id}', [PaymentController::class, 'show'])->name('payment.show.web');
        Route::post('payments/update/{id}', [PaymentController::class, 'edit'])->name('payment.edit.web');
        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('settings/store', [SettingController::class, 'store'])->name('settings.store');
        Route::post('settings/edit/{id}', [SettingController::class, 'edit'])->name('settings.edit');
        Route::post('settings/invoice-store',[SettingController::class, 'storeInvoice'])->name('invoice.store');
        Route::post('settings/invoice-edit/{id}', [SettingController::class, 'editInvoice'])->name('invoice.edit');
        Route::get('check-category-tab', [categoryController::class, 'checkCategoryTab'])->name('check-category-tab');
        Route::get('check-product-tab', [categoryController::class, 'checkProductTab'])->name('check-product-tab');
        Route::post('update-paginate', [categoryController::class, 'updatePerPage'])->name('updatePerPage');

    });
});

require __DIR__ . '/auth.php';

