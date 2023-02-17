<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $recipes = Recipe::withTrashed()->paginate(10);

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

    public function delete($id): RedirectResponse
    {
        $recipe = Recipe::withTrashed()->find($id);

        $recipe->is_active = false; // is_active turbut nereikalingas turint sofDelete
        if($recipe === null) { abort(404); }

        $recipe->delete();
        $recipe->save();

        return redirect()->route('admin.recipes')->with('success', 'recipe deleted');
    }
}
