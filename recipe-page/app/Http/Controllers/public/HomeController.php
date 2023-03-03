<?php

namespace App\Http\Controllers\public;

use App\Models\Recipe;
use Illuminate\Routing\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::latest('created_at')->where('is_active', '=', 1)->take(10)->get();

        return view('public/recipes/home', compact('recipes'));
    }
}
