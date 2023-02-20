<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IngredientController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::withTrashed()->paginate(10);

        return view('admin/ingredients/index', compact('ingredients'));

    }

    public function show($id)
    {
        $ingredient = Ingredient::withTrashed()->find($id);
        $recipes = Recipe::whereHas('ingredients', function($q) use ($id) {
            $q->where('ingredient_id', $id);
        })
            ->with('category')
            ->paginate(10);

        return view('admin/ingredients/show', compact('ingredient', 'recipes'));
    }

    public function createGet()
    {

    }
    public function createPost()
    {

    }

    public function editGet()
    {

    }
    public function editPost()
    {

    }

    public function delete()
    {

    }
}
