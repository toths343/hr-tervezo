<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\AuthUser;
use App\Services\LoginService;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function __construct(private readonly LoginService $loginService)
    {
    }

    public function index(): View
    {
        return view('login.index');
    }

    public function login(LoginRequest $loginRequest): RedirectResponse
    {
        $validated = $loginRequest->validated();

        return $this->loginService->login($loginRequest, $validated);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

}
