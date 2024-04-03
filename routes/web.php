<?php

use App\Constants\CategoryConstants;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
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
Route::post('category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('image-upload',[CategoryController::class,'upload'])->name('imageUpload');
Route::get('/upload_items',function (){return view('pages.upload_items');})->name('upload_items');
Route::get('/users',[UserController::class,'index'])->name('users');;
Route::get('user/destroy/{id}',[UserController::class,'destroy']);
Route::post('user/store',[UserController::class,'store'])->name('user.store');
Route::get('user/show/{id}',[UserController::class,'show'])->name('user.show');
Route::get('/categories',[CategoryController::class,'index'])->name('categories');;
Route::post('Category/store',[CategoryController::class,'store'])->name('category.store');
