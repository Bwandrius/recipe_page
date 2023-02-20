<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IngredientController extends Controller
{
    public function index(): View
    {
        $ingredients = Ingredient::withTrashed()->paginate(10);

        return view('admin/ingredients/index', compact('ingredients'));

    }

    public function show()
    {

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
