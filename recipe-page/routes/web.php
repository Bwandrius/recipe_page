<?php

use App\Http\Controllers\admin\RecipeController as AdminRecipeController;
use App\Http\Controllers\admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\admin\IngredientController as AdminIngredientController;

use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\auth\UserController;
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

/// PUBLIC

Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('public.homepage');
});

Route::controller(RecipeController::class)->group(function () {
    Route::get('recipes', 'index')->name('public.all.recipes');
    Route::get('recipe/{id}', 'show')->name('public.single.recipe');
});

/// AUTH:

Route::controller(AuthController::class)->group(function () {

    Route::middleware(['guest'])->group(function() {
        Route::get('login', 'loginGet')->name('login');
        Route::post('login', 'authenticateLogin')->name('authenticate');
    });

    Route::middleware(['auth'])->group(function () {
        Route::post('logout', 'logout')->name('logout');
    });
});

/// USER:

Route::middleware(['auth'])->group(function () {
    Route::controller(UserController::class)->group(function () {
        Route::get('profile', 'show')->name('user.profile');
        Route::get('change-password', 'changePasswordGet')->name('user.change.password');
        Route::post('change-password', 'changePasswordPost');
    });
});

Route::middleware(['guest'])->group(function () {
    Route::get('register', [UserController::class, 'registerGet'])
        ->name('user.registration');
    Route::post('register', [UserController::class, 'registerPost']);
});

/// ADMIN:

Route::middleware(['auth', 'role'])->group(function () {

    Route::controller(AdminRecipeController::class)->group(function () {
        Route::get('admin/recipes', 'index')->name('admin.recipes');
        Route::get('admin/recipe/create', 'createGet')->name('admin.recipe.create');
        Route::post('admin/recipe/create', 'createPost');
        Route::get('admin/recipe/{id}', 'show')->name('admin.recipe.page');
        Route::get('admin/recipe/edit/{id}','editGet')->name('admin.recipe.edit');
        Route::post('admin/recipe/edit/{id}', 'editPost');
        Route::delete('admin/recipe/delete/{id}', 'delete')->name('admin.recipe.delete');
    });

    Route::controller(AdminCategoryController::class)->group(function () {
        Route::get('admin/categories',  'index')->name('admin.categories');
        Route::get('admin/category/create', 'createGet')->name('admin.category.create');
        Route::post('admin/category/create', 'createPost');
        Route::get('admin/category/show/{id}', 'show')->name('admin.category.page');
        Route::get('admin/category/edit/{id}', 'editGet')->name('admin.category.edit');
        Route::post('admin/category/edit/{id}', 'editPost');
        Route::delete('admin/category/delete/{id}', 'delete')->name('admin.category.delete');
    });

    Route::controller(AdminIngredientController::class)->group(function () {
        Route::get('admin/ingredients', 'index')->name('admin.ingredients');
        Route::get('admin/ingredient/create', 'createGet')->name('admin.ingredient.create');
        Route::post('admin/ingredient/create', 'createPost');
        Route::get('admin/ingredient/show/{id}', 'show')->name('admin.ingredient.page');
        Route::get('admin/ingredient/edit/{id}', 'editGet')->name('admin.ingredient.edit');
        Route::post('admin/ingredient/edit/{id}', 'editPost');
        Route::delete('admin/ingredient/delete/{id}', 'delete')->name('admin.ingredient.delete');
    });
});









