<?php

use App\Http\Controllers\admin\RecipeController as AdminRecipeController;
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
