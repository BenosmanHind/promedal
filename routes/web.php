<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
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
Route::middleware('auth')->group(function () {
Route::get('/admin', function () {
        return view('admin.dashboard-admin');
    });
Route::resource('/admin/categories',CategoryController::class);
Route::resource('/admin/products',ProductController::class);
Route::get('/show-children-category/{id}', [App\Http\Controllers\CategoryController::class, 'showChildrenCategory']);
Route::get('/edit-children-category/{id}', [App\Http\Controllers\CategoryController::class, 'editChildrenCategory']);
Route::get('/delete-children-category/{id}', [App\Http\Controllers\CategoryController::class, 'deleteChildrenCategory']);
Route::put('/update-children-category/{id}', [App\Http\Controllers\CategoryController::class, 'updateChildrenCategory']);
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
