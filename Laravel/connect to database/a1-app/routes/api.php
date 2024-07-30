<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderProductController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PromotionController;
use App\Http\Controllers\Api\PromotionProductController;
use App\Http\Controllers\Api\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::get('/student/list', [StudentController::class, 'index'])->name('student.list');
Route::post('/student/create', [StudentController::class, 'store'])->name('student.create');
Route::get('/student/show/{id}', [StudentController::class, 'show'])->name('student.show');
Route::put('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

Route::get('/category/list',[CategoryController::class,'index']);
Route::post('/category/create',[CategoryController::class,'store']);
Route::get('/category/show/{id}',[CategoryController::class,'show']);
Route::get('/category/showAll', [CategoryController::class, 'showAllxByName']);
Route::put('/category/update/{id}',[CategoryController::class,'update']);
Route::delete('/category/delete/{id}',[CategoryController::class,'destroy']);

Route::get('/product/list',[ProductController::class,'index']);
Route::post('/product/create',[ProductController::class,'store']);
Route::get('/product/show/{id}',[ProductController::class,'show']);
// Route::get('/product/showAll', [ProductController::class, 'showAllByName']);
Route::put('/product/update/{id}',[ProductController::class,'update']);
Route::delete('/product/delete/{id}',[ProductController::class,'destroy']);

Route::get('/promotion/list',[PromotionController::class,'index']);
Route::post('/promotion/create',[PromotionController::class,'store']);
Route::get('/promotion/show/{id}',[PromotionController::class,'show']);
Route::get('/promotion/showAll', [PromotionController::class, 'showAllByName']);
Route::put('/promotion/update/{id}',[PromotionController::class,'update']);
Route::delete('/promotion/delete/{id}',[PromotionController::class,'destroy']);

Route::get('/promotionProduct/list',[PromotionProductController::class,'index']);
Route::post('/promotionProduct/create',[PromotionProductController::class,'store']);
Route::get('/promotionProduct/show/{id}',[PromotionProductController::class,'show']);
Route::get('/promotionProduct/showAll', [PromotionProductController::class, 'showAllByName']);
Route::put('/promotionProduct/update/{id}',[PromotionProductController::class,'update']);
Route::delete('/promotionProduct/delete/{id}',[PromotionProductController::class,'destroy']);

Route::get('/order_product/list',[OrderProductController::class,'index']);
Route::post('/order_product/create',[OrderProductController::class,'placeOrder']);
Route::get('/order_product/show/{id}',[OrderProductController::class,'show']);
Route::get('/order_product/showAll', [OrderProductController::class, 'showAllByName']);
Route::put('/order_product/update/{id}',[OrderProductController::class,'update']);
Route::delete('/order_product/delete/{id}',[OrderProductController::class,'destroy']);

Route::get('/order/list',[OrderController::class,'index']);
Route::post('/order/create',[OrderController::class,'store']);
Route::get('/order/show/{id}',[OrderController::class,'show']);
Route::get('/order/showAll', [OrderController::class, 'showAllByName']);
Route::put('/order/update/{id}',[OrderController::class,'update']);
Route::delete('/order/delete/{id}',[OrderController::class,'destroy']);