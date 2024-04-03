<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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
Route::get('/categories',[CategoryController::class, 'index'])->name('categories');
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('category/image-upload',[CategoryController::class,'upload'])->name('category.imageUpload.');
Route::get('/upload_items',function (){
    $categories = Category::all();
    return
    view('pages.upload_items')->with('categories',$categories);
})->name('upload_items');
Route::get('/users',[UserController::class,'index'])->name('users');;
Route::get('user/destroy/{id}',[UserController::class,'destroy']);
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/products',[ProductController::class,'index'])->name('products');
Route::get('product/destroy/{id}',[ProductController::class,'destroy']);
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::post('product/image-upload',[ProductController::class,'upload'])->name('product.imageUpload');
Route::get('product/show/{id}',[ProductController::class,'show'])->name('product.show');

