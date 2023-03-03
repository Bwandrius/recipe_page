<?php

namespace App\Http\Controllers\public;

use App\Models\Category;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $recipes = Recipe::query();
        $categories = Category::where('is_active', '=', 1)->get();

        if ($request->query('category_id')) {
            $recipes->where('category_id', '=', $request->query('category_id'));
        }

        if ($request->query('name')) {
            $recipes->where('name', 'like', '%' . $request->query('name') . '%');
        }

        return view('public/recipes/index', [
            'recipes' => $recipes->paginate(20),
            'categories' => $categories,
            'request' => $request
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
