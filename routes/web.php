<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsCategoryController;
use App\Http\Controllers\NewsSubCategoryController;
use App\Http\Controllers\NewsSubCategoryCon;


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
// Category route  
Route::get('/add-news-category',[NewsCategoryController::class,'catUrl']);
Route::post('/add-category',[NewsCategoryController::class,'insertCategory']);
Route::get('/view-category',[NewsCategoryController::class,'viewCategoryUrl']);
Route::get('/delete-category/{id}',[NewsCategoryController::class,'deleteCategory']);
Route::get('/deleted-category-view',[NewsCategoryController::class,'deleteCategoryView']);
Route::get('/edit-category/{id}',[NewsCategoryController::class,'editCategoryurl']);
Route::post('/edit-category',[NewsCategoryController::class,'editCategory']);
Route::get('/restore/{id}',[NewsCategoryController::class,'restore']);
Route::get('/delete-category/{id}',[NewsCategoryController::class,'permanentDelete']);
// Route::resource('/sub-category',NewsSubCategoryController::class);

// Sub Category Route  
Route::get('/add-sub-categoryurl',[NewsSubCategoryCon::class,'index']);
Route::post('/add-sub-category',[NewsSubCategoryCon::class,'store']);
Route::get('/view-sub-category',[NewsSubCategoryCon::class,'view']);
Route::get('/delete/{id}',[NewsSubCategoryCon::class,'delete']);
Route::get('/delete-data-view',[NewsSubCategoryCon::class,'deletedDataView']);
Route::get('/restore/{id}',[NewsSubCategoryCon::class,'restore']);
Route::get('/delete/{id}',[NewsSubCategoryCon::class,'permanentDelete']);
Route::get('/update/{id}',[NewsSubCategoryCon::class,'updateUrl']);