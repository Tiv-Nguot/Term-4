<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\BorrowRecordController;
use App\Http\Controllers\Api\UserController;
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

Route::get('/user/list',[UserController::class,'index']);
Route::post('/user/create',[UserController::class,'store']);
Route::post('/user/show/{id}',[UserController::class,'show']);
Route::put('/user/update/{id}',[UserController::class,'update']);
Route::delete('/user/delete/{id}',[UserController::class,'destroy']);

Route::get('/book/list',[BookController::class,'index']);
Route::get('/book/borrowed/list',[BookController::class,'borrowed']);
Route::post('/book/create',[BookController::class,'store']);
Route::post('/book/show/{id}',[BookController::class,'show']);
Route::put('/book/update/{id}',[BookController::class,'update']);
Route::delete('/book/delete/{id}',[BookController::class,'destroy']);

Route::get('/borrow_record/list',[BorrowRecordController::class,'index']);
Route::get('/borrow_record/date',[BorrowRecordController::class,'getBorrowByDate']);
Route::post('/borrow_record/create',[BorrowRecordController::class,'store']);
Route::post('/borrow_record/show/{id}',[BorrowRecordController::class,'show']);
Route::put('/borrow_record/update/{id}',[BorrowRecordController::class,'update']);
Route::delete('/borrow_record/delete/{id}',[BorrowRecordController::class,'destroy']);
