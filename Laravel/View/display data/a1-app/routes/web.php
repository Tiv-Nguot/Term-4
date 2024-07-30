<?php

use App\Http\Controllers\Api\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', [StudentController::class, 'list'])->name('student.list');
Route::post('/students/create', [StudentController::class, 'store']); 
Route::delete('/students/delete/{id}', [StudentController::class, 'destroy']);
Route::put('/students/update/{id}', [StudentController::class, 'update']);


