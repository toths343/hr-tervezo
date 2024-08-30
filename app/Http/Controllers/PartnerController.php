<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeDateRequest;
use App\Http\Requests\Entity\PartnerRequest;
use App\Models\Partner;
use App\Services\DateService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function save(PartnerRequest $request): JsonResponse
    {
        $attributes = $request->all();
        $attributes = array_combine(array_map(fn ($key) => Str::snake($key), array_keys($attributes)), $attributes);
        if ($request->route('uid')) {
            $partner = Partner::query()->find($request->route('uid'));
            $partner->update($attributes);
        } else {
            Partner::query()->create($attributes);
        }

        return response()->json();
    }
}
