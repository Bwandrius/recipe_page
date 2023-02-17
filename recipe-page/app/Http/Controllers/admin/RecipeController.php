<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rules\File;

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

        if ($recipe === null) {
            abort(404,);
        }

        $ingredients = $recipe->ingredients;

        return view('admin/recipes/show', compact('recipe', 'ingredients'));
    }

    public function createGet(): View
    {
        $recipes = Recipe::all();
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('admin/recipes/create', compact('recipes', 'categories', 'ingredients'));
    }
    public function createPost(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'category_id' => 'required',
            'ingredient_id' => 'required',
            'image' => ['required', File::image()->max(12 * 1024)],
        ]);

        $recipe = Recipe::create($request->all());


        $file = $request->file('image');
        $path = $file->store('recipe_images');
        $recipe->image = $path;
        $recipe->is_active = $request->post('is_active', true);
        $recipe->save();

        $ingredients = Ingredient::find($request->post('ingredient_id'));
        $recipe->ingredients()->attach($ingredients);

        return redirect()->route('admin.recipes')->with('success', 'Recipe created successfully.');

    }

    public function editGet($id): View
    {
        $recipe = Recipe::find($id);
        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('admin/recipes/edit', compact('recipe', 'categories', 'ingredients'));
    }
    public function editPost($id, Request $request)
    {
        $recipe = Recipe::find($id);

        if($recipe === null)
        {
            abort(404);
        }

        if($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3|max:50',
                'category_id' => 'required',
                'ingredient_id' => 'required|array'
            ]);

            $recipe->name = $request->input('name');
            $recipe->category_id = $request->input('category_id');
            $recipe->description = $request->input('description');
            $recipe->save();

            $selectedIngredients = $request->input('ingredient_id', []);
            $recipe->ingredients()->sync($selectedIngredients);

            return redirect()->route('admin.recipes')->with('success', 'Recipe updated successfully.');
        }

        $categories = Category::all();
        $ingredients = Ingredient::all();

        return view('admin/recipes/edit', [
            'recipe' => $recipe,
            'categories' => $categories,
            'ingredients' => $ingredients
        ]);
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
