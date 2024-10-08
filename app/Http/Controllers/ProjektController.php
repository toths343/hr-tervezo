<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entity\ProjektRequest;
use App\Models\Base\Projekt as ProjektBase;
use App\Models\Partner;
use App\Models\Projekt;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class ProjektController extends Controller
{
    public function save(ProjektRequest $request): JsonResponse
    {
        $attributes = $request->all();
        if (!$attributes[Str::camel(ProjektBase::PRJ_ID)]) {
            $attributes[Str::camel(ProjektBase::PRJ_ID)] = Partner::getNextId();
        }
        $attributes = array_combine(array_map(fn($key) => Str::snake($key), array_keys($attributes)), $attributes);
        if ($request->route('uid')) {
            $projekt = Projekt::query()->find($request->route('uid'));
            $projekt->update($attributes);
        } else {
            $projekt = Projekt::query()->create($attributes);
        }

        $request->session()->flash(
            'successSaveMessage',
            __('projekt.sikeres_mentes', ['uniqueName' => $projekt->getUniqueName()])
        );
        return response()->json();
    }
}
