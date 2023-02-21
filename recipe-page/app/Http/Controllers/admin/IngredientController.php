<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IngredientController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::withTrashed()->paginate(10);

        return view('admin/ingredients/index', compact('ingredients'));

    }

    public function show($id): View
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($ingredient === null) { abort(404); }

        $recipes = Recipe::whereHas('ingredients', function($q) use ($id) {
            $q->where('ingredient_id', $id);
        })
            ->with('category')
            ->paginate(10);

        return view('admin/ingredients/show', compact('ingredient', 'recipes'));
    }

    public function createGet(): View
    {
        return view('admin/ingredients/create');
    }
    public function createPost(Request $request): RedirectResponse
    {
        $request->validate([ 'name' => 'required|min:3|max:50' ]);

        $ingredient = Ingredient::create($request->all());
        $ingredient->name = $request->post('name');
        $ingredient->is_active = $request->post('is_active', true);
        $ingredient->save();

        return redirect()->route('admin.ingredients')->with('success', 'Ingredient created successfully.');
    }

    public function editGet($id): View
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($ingredient === null) { abort(404); }

        return view('admin/ingredients/edit', compact('ingredient'));
    }
    public function editPost($id, Request $request): RedirectResponse
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($request->isMethod('post')){
            $request->validate([ 'name' => 'required|min:3|max:50']);
        }

        $ingredient->name = $request->input('name');
        $ingredient->save();

        return redirect()->route('admin.ingredients')->with('success', 'Ingredient updated successfully.');
    }

    public function delete($id)
    {
        $ingredient = Ingredient::withTrashed()->find($id);

        if($ingredient === null) { abort(404); }

        $ingredient->is_active = false;
        $ingredient->delete();
        $ingredient->save();

        return redirect()->route('admin.ingredients')->with('success', 'Ingredient deleted successfully.');
    }
}
