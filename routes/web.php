<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImportController;

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

Route::get('/', [AdminController::class, 'dashboard']);
Route::get('/admins/dashboard', [AdminController::class, 'dashboard2']);



Route::get('/posts/import', [ImportController::class, 'import']);
Route::get('/posts/export', [ImportController::class, 'export']);
Route::post('/import_file', [ImportController::class, 'import_file'])->name('import_file');
Route::get('/posts/data', [DataController::class, 'data']);
Route::post('/posts/import', [ImportController::class, 'file_path']);
Route::post('/posts', [DataController::class, 'store'])->name('store');

