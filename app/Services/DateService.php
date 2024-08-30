<?php

namespace App\Services;

use App\Http\Requests\ChangeDateRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;

class DateService
{

    public function changeDate(ChangeDateRequest $changeDateRequest, array $validated): RedirectResponse
    {
        $actDate = Carbon::createFromFormat('Y.m.d', $validated['actDate']);
        $startDate = Carbon::createFromFormat('Y.m.d', $validated['startDate']);
        $endDate = Carbon::createFromFormat('Y.m.d', $validated['endDate']);
        if ($startDate > $actDate) {
            $startDate = $actDate->copy()->startOfYear();
        }
        if ($endDate < $actDate) {
            $endDate = $actDate->copy()->endOfYear();
        }

        $changeDateRequest->session()->put('actDate', $actDate);
        $changeDateRequest->session()->put('startDate', $startDate);
        $changeDateRequest->session()->put('endDate', $endDate);

        return redirect()->intended();
    }

}
