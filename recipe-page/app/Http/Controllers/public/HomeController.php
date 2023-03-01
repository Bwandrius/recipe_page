<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use mysql_xdevapi\Collection;

class HomeController extends Controller
{
    public function index(): View
    {
        $recipes = Recipe::latest('created_at')->where('is_active', '=', 1)->take(10)->get();

        return view('public/recipes/home', compact('recipes'));
    }
}
