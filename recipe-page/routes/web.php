<?php

use App\Http\Controllers\admin\RecipeController as AdminRecipeController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\IngredientController as AdminIngredientController;

use App\Http\Controllers\public\HomeController;
use App\Http\Controllers\public\RecipeController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

/// PUBLIC

Route::get('/', [HomeController::class, 'index'])->name('public.homepage');


Route::get('recipes', [RecipeController::class, 'index'])->name('public.recipes');


/// ADMIN

Route::get('admin/recipes', [AdminRecipeController::class, 'index'])->name('admin.recipes');
Route::get('admin/recipe/create', [AdminRecipeController::class, 'createGet'])->name('admin.recipe.create.form');
Route::post('admin/recipe/create', [AdminRecipeController::class, 'createPost']);
Route::get('admin/recipe/{id}', [AdminRecipeController::class, 'show'])->name('admin.recipe.page');
Route::get('admin/recipe/edit/{id}', [AdminRecipeController::class, 'editGet'])->name('admin.recipe.edit.get');
Route::post('admin/recipe/edit/{id}', [AdminRecipeController::class, 'editPost'])->name('admin.recipe.edit.post');
Route::delete('admin/recipe/delete/{id}', [AdminRecipeController::class, 'delete'])->name('admin.recipe.delete');


Route::get('admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories');
Route::get('admin/category/create', [AdminCategoryController::class, 'createGet'])->name('admin.category.create.get');
Route::post('admin/category/create', [AdminCategoryController::class, 'createPost'])->name('admin.category.create.post');
Route::get('admin/category/show/{id}', [AdminCategoryController::class, 'show'])->name('admin.category.page');
Route::get('admin/category/edit/{id}', [AdminCategoryController::class, 'editGet'])->name('admin.category.edit.get');
Route::post('admin/category/edit/{id}', [AdminCategoryController::class, 'editPost'])->name('admin.category.edit.post');
Route::delete('admin/category/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');


Route::get('admin/ingredients', [AdminIngredientController::class, 'index'])->name('admin.ingredients');
Route::get('admin/ingredient/create', [AdminIngredientController::class, 'createGet'])->name('admin.ingredient.create');
Route::post('admin/ingredient/create', [AdminIngredientController::class, 'createPost']);
Route::get('admin/ingredient/show/{id}', [AdminIngredientController::class, 'show'])->name('admin.ingredient.page');
Route::get('admin/ingredient/edit/{id}', [AdminIngredientController::class, 'editGet'])->name('admin.ingredient.edit');
Route::post('admin/ingredient/edit/{id}', [AdminIngredientController::class, 'editPost']);
Route::delete('admin/ingredient/delete/{id}', [AdminIngredientController::class, 'delete'])->name('admin.ingredient.delete');
