<?php

namespace App\Http\Controllers\auth;

use Illuminate\Routing\Controller;
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

    public function changePasswordGet(): View
    {
        return view('auth/user/change_password');
    }
    public function changePasswordPost(Request $request)
    {
        // validate the request data
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|same:new_password',
        ]);

        // get the currently authenticated user
        $user = Auth::user();

        // verify that the current password is correct
        if (!Hash::check($validatedData['current_password'], $user->password)) {
            return response()->json(['message' => 'Incorrect current password'], 400);
        }

        // hash the new password
        $newPassword = Hash::make($validatedData['new_password']);

        // update the user's password
        $user->password = $newPassword;
        $user->save();

        return redirect('profile')
            ->with('success', 'Password changed successfully!');
    }

}
