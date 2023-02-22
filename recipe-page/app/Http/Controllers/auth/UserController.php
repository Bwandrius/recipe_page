<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(): View
    {
        return view('auth/user/profile', ['user' => Auth::user()]);
    }

    public function registerGet(): View
    {
        return view('auth/user/register_new_user');
    }
    public function registerPost()
    {

    }
}
