<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\AuthUser;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
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

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
