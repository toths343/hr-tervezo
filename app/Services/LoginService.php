<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginService
{

    public function login(LoginRequest $loginRequest, array $validated): RedirectResponse
    {
        if (Auth::attempt([
            'user_login' => $validated['userName'],
            'password' => $validated['password'],
        ])) {
            $loginRequest->session()->regenerate();
            $now = Carbon::now();
            $loginRequest->session()->put('actDate', $now);
            $loginRequest->session()->put('startDate', $now->copy()->startOfYear());
            $loginRequest->session()->put('endDate', $now->copy()->endOfYear());
            return redirect()->intended();
        }

        return back()->withErrors([
            'userName' => __('login.auth_failed'),
        ])->onlyInput('userName');
    }

}
