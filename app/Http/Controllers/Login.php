<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class Login extends Controller
{

    public function index(): View
    {
        return view('login.index');
    }

    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        $validated = $loginRequest->validated();

        if (Auth::attempt([
            'user_login' => $validated['userName'],
            'password' => $validated['password'],
        ])) {
            $loginRequest->session()->regenerate();
            return redirect()->intended();
        }

        return back()->withErrors([
            'userName' => __('login.auth_failed'),
        ])->onlyInput('userName');
    }

    public function logout(): RedirectResponse
    {
        return redirect('/login');
    }

}
