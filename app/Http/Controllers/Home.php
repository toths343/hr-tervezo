<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class Home extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

    public function changeDate(): RedirectResponse
    {
        return redirect()->intended();
    }
}
