<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeDateRequest;
use App\Services\DateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function __construct(private readonly DateService $dateService)
    {
    }

    public function index(): View
    {
        return view('home.index');
    }

    public function changeDate(ChangeDateRequest $changeDateRequest): RedirectResponse
    {
        $validated = $changeDateRequest->validated();

        return $this->dateService->changeDate($changeDateRequest, $validated);
    }
}
