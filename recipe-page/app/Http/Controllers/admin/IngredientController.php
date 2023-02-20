<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
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

//        $count = DB::table('recipe_ingredients')
//            ->join('recipes', 'recipe_ingredients.recipe_id', '=', 'recipes.id')
//            ->select(DB::raw('count(*) as recipe_count'))
//            ->where('recipe_ingredients.ingredient_id', $id)
//            ->whereNull('recipes.deleted_at')
//            ->first()
//            ->recipe_count;

        return view('admin/ingredients/show', compact('ingredient', ));
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
