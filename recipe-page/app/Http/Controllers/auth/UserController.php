<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
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
    public function registerPost(Request $request): RedirectResponse
    {
        $requestData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'unique:users,email',
            'password' => ['required', Password::min(8)],
//            'role' => 'required'
        ]);

        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['email_verified_at'] = new DateTime();
        $requestData['role'] = 'user';
        User::create($requestData);

        return redirect('login')
            ->with('success', 'User created successfully!');
    }
}
