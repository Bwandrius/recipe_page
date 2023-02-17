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

        if ($recipe === null) {
            abort(404,);
        }

        return view('admin/recipes/show', compact('recipe', 'ingredients'));
    }

    public function delete($id): View
    {
        $recipe = Recipe::find($id);

        if($recipe === null) { abort(404); }

        $recipe->felete();

        return view('admin/recipes/index')->with('success', 'recipe deleted');
    }
}
