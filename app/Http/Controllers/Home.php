<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class Home extends Controller
{
    public function index(): View
    {
        return view('home.index');
    }

}
