<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\Sale;
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

Route::get('/',function (){return view('pages.dashboard');})->name('home');
//Route::get('/settings',function (){return view('pages.setting');})->name('settings');
Route::get('/categories',[CategoryController::class, 'index'])->name('categories');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/image-upload',[CategoryController::class,'upload'])->name('category.imageUpload.');
Route::get('/upload_items',function (){
    $categories = Category::all();
    return
    view('pages.upload_items')->with('categories',$categories);
})->name('upload_items');

Route::get('/sales',function (){
    $sales = Sale::all();
    return
    view('pages.sales')->with('sales',$sales);
})->name('sales');

Route::get('/update_items/{id}',[ProductController::class,'edit'])->name('update_items');
Route::get('/peoples',[UserController::class,'index'])->name('peoples');
Route::get('user/destroy/{id}',[UserController::class,'destroy']);
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::post('user/edit/{id}',[UserController::class,'edit'])->name('user.edit');
Route::get('/products',[ProductController::class,'index'])->name('products');
Route::get('product/destroy/{id}',[ProductController::class,'destroy'])->name('product.destroy');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::post('product/image-upload',[ProductController::class,'upload'])->name('product.imageUpload');
Route::get('product/show/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::get('category/destroy/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::get('sale/destroy/{id}',[SaleController::class,'destroy'])->name('sale.destroy');
Route::get('sale/show/{id}',[saleController::class,'show'])->name('sale.show');
Route::get('category/show/{id}',[categoryController::class,'show'])->name('category.show');
