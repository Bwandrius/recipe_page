<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::latest('created_at')->take(10)->get();

        return view('public/recipes/home', compact('recipes'));
    }
}
