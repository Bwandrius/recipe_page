<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function home(): View
    {
        $recipes = Recipe::latest('created_at')->take(10)->get();

        return view('public/recipes/home', compact('recipes'));
    }

    public function index(Request $request): View
    {
        $recipes = Recipe::query();
        $categories = Category::all();
        $ingredients = Ingredient::all();

        if ($request->query('category_id')) {
            $recipes->where('category_id', '=', $request->query('category_id'));
        }

        return view('public/recipes/index', [
            'recipes' => $recipes->paginate(18),
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);
    }

    public function show($id): View
    {
        $recipe = Recipe::find($id);

        if ($recipe === null) {
            abort(404);
        }

        return view('public/recipes/show', compact('recipe'));
    }
}
