<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\View\View;

class Login extends Controller
{

    public function index(): View
    {
        return view('login.index');
    }

    public function login(LoginRequest $loginRequest)
    {

    }

}
