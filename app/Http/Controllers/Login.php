<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
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

        return redirect('/');
    }

    public function logout(): RedirectResponse
    {
        return redirect('/login');
    }

}
