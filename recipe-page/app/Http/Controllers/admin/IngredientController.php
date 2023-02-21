<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\Request;
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

        if($ingredient === null)
        {
            abort(404);
        }

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

    public function editGet($id)
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($ingredient === null)
        {
            abort(404);
        }

        return view('admin/ingredients/edit', compact('ingredient'));
    }
    public function editPost($id, Request $request)
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($request->isMethod('post')){
            $request->validate([ 'name' => 'required|min:3|max:50']);
        }

        $ingredient->name = $request->input('name');
        $ingredient->save();

        return redirect()->route('admin.ingredients')->with('success', 'Ingredient updated successfully.');
    }

    public function delete()
    {

    }
}
