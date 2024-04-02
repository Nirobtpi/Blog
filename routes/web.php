<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsSubCategoryController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
    return view('backend.dashboard');
});
Route::get('/add-news-category',[NewsCategoryController::class,'catUrl']);
Route::post('/add-category',[NewsCategoryController::class,'insertCategory']);
Route::get('/view-category',[NewsCategoryController::class,'viewCategoryUrl']);
Route::get('/delete-category/{id}',[NewsCategoryController::class,'deleteCategory']);
Route::get('/deleted-category-view',[NewsCategoryController::class,'deleteCategoryView']);
Route::get('/restore/{id}',[NewsCategoryController::class,'restore']);
// Route::resource('/sub-category',NewsSubCategoryController::class);