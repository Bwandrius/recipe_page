<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::withTrashed()->paginate(10);

        return view('admin/categories/index', compact('categories'));
    }

    public function show($id): View
    {
        $category = Category::withTrashed()->find($id);

        if ($category === null) {
            abort(404);
        }

        return view('admin/categories/show', compact('category'));
    }

    public function createGet()
    {

    }
    public function createPost()
    {

    }

    public function editGet($id): View
    {
        $category = Category::withTrashed()->find($id);

        return view('admin/categories/edit', compact('category'));
    }
    public function editPost($id, Request $request): RedirectResponse
    {
        $category = Category::withTrashed()->find($id);

        if($category === null)
        {
            abort(404);
        }

        if($request->isMethod('post')){
            $request->validate([ 'name' => 'required|min:3|max:50']);


        }

        $category->name = $request->input('name');
        $category->is_active = $request->post('is_active', true);
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');


    }

    public function delete($id): RedirectResponse
    {
        $category = Category::withTrashed()->find($id);

        $category->is_active = false; // is_active turbut nereikalingas turint sofDelete
        if($category === null) { abort(404); }

        $category->delete();
        $category->save();

        return redirect()->route('admin.categories')->with('success', 'category deleted');
    }
}
