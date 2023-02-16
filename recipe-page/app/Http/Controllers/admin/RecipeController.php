<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $recipes = Recipe::paginate(10);

        return view('admin/recipes/index', compact('recipes'));
    }

    public function show($id, Request $request): View
    {
        $recipe = Recipe::find($id);
        $ingredients = $recipe->ingredients;

        return view('admin/recipes/show', compact('recipe', 'ingredients'));
    }
}
