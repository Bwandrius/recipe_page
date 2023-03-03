<?php

namespace App\Http\Controllers\admin;

//use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Validation\Rules\File;

class RecipeController extends Controller
{
    public function index(Request $request): View
    {
        $recipes = Recipe::query()->withTrashed();
        $categories = Category::withTrashed()->get();


        if ($request->query('category_id')) {
            $recipes->where('category_id', '=', $request->query('category_id'));
        }

        if ($request->query('name')) {
            $recipes->where('name', 'like', '%' . $request->query('name') . '%');
        }

        return view('admin/recipes/index', [
            'recipes' => $recipes->paginate(10),
            'categories' => $categories,
            'request' => $request
        ]);
    }

    public function show($id): View
    {
        $recipe = Recipe::withTrashed()->find($id);

        if ($recipe === null) { abort(404); }

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
            'image' => [File::image()->max(256 * 1024)],
        ]);

        $recipe = Recipe::create($request->all());

        $file = $request->file('image');
        $path = $file->store('public/images');
        $imageName = basename($path);
        $recipe->image = $imageName;

        $recipe->is_active = $request->post('is_active', true);

        $ingredients = Ingredient::find($request->post('ingredient_id'));
        $recipe->ingredients()->attach($ingredients);

        $recipe->save();

        return redirect()->route('admin.recipes')->with('success', 'Recipe created successfully.');

    }

    public function editGet($id): View
    {
        $recipe = Recipe::withTrashed()->find($id);
        $categories = Category::all();
        $ingredients = Ingredient::all();

        if($recipe === null) { abort(404); }

        return view('admin/recipes/edit', compact('recipe', 'categories', 'ingredients'));
    }
    public function editPost($id, Request $request): RedirectResponse
    {
        $recipe = Recipe::withTrashed()->find($id);

        if ($request->isMethod('post')) {
            $request->validate([
                'name' => 'required|min:3|max:50',
                'category_id' => 'required',
                'ingredient_id' => 'required|array',
                'image' => [File::image()->max(256 * 1024)]
            ]);
        }

        $recipe->name = $request->input('name');
        $recipe->category_id = $request->input('category_id');
        $recipe->description = $request->input('description');

        $file = $request->file('image');
        if ($file) {
            if ($recipe->image && file_exists(public_path('storage/' . $recipe->image))) {
                unlink(public_path('storage/' . $recipe->image));
            }

            $path = $file->store('public/images');
            $imageName = basename($path);
            $recipe->image = $imageName;
        }

        $recipe->is_active = $request->post('is_active', true);

        $selectedIngredients = $request->input('ingredient_id', []);
        $recipe->ingredients()->sync($selectedIngredients);

        $recipe->save();

        return redirect()->route('admin.recipes')->with('success', 'Recipe updated successfully.');
    }

    public function delete($id): RedirectResponse
    {
        $recipe = Recipe::withTrashed()->find($id);

        $recipe->is_active = false;
        if($recipe === null) { abort(404); }

        $recipe->delete();
        $recipe->save();

        return redirect()->route('admin.recipes')->with('success', 'recipe deleted');
    }
}
