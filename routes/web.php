<?php

use App\Http\Controllers\Backend\Category\CategoryController;
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Transcation\TranscationController;
use App\Http\Controllers\Frontend\Home\HomeController;
use App\Http\Controllers\Frontend\Product\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\transcation\TranscationController as FrontendTransactionController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/',[HomeController::class,'index'])->name('mainpage');
Route::get('/category/{id}',[FrontendProductController::class, 'category'])->name('books.category');
Route::get('/detail/{id}', [FrontendProductController::class, 'show'])->name('books.detail');
Route::get('/transaction/{id}', [FrontendTransactionController::class, 'index'])->name('transaction.index');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::get('/transcation',[TranscationController::class,'index'])->name('transcation.index');
    Route::get('/transcation/{id}',[TranscationController::class,'show'])->name('transcation.show');
    Route::post('/transcation/{id}',[TranscationController::class,'update'])->name('transcation.update');
});
