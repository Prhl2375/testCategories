<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, "indexAction"]);
Route::post('/deleteCategory', [\App\Http\Controllers\MainController::class, "deleteCategoryAction"]);
Route::post('/editCategory', [\App\Http\Controllers\MainController::class, "editCategoryAction"]);
Route::post('/addCategory', [\App\Http\Controllers\MainController::class, "addCategoryAction"]);
Route::post('/editInfoSingle', [\App\Http\Controllers\SingleCategoryController::class, "setInfo"]);
Route::get('/singleCategory/{id}', [\App\Http\Controllers\SingleCategoryController::class, "indexAction"]);
