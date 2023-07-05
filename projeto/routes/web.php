<?php

use Illuminate\Support\Facades\Route;
use App\Models\Models\ModelBook;
use App\Http\Controllers\BookController;

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


Route::get('/', [BookController::class, 'index']);

Route::get('/tasks/create', [BookController::class, 'create']);

Route::get('/tasks', [BookController::class, 'index']);

Route::get('/tasks/{id}', [BookController::class, 'show']);

Route::post('/tasks', [BookController::class, 'store']);

Route::get('/tasks/{id}/edit', [BookController::class, 'edit']);

Route::put('/tasks/{id}', [BookController::class, 'update']);

Route::delete('/tasks/{id}', [BookController::class, 'destroy'])->name('tasks.destroy');

