<?php

namespace App\Http\Controllers;

use App\Http\Requests\Entity\PartnerRequest;
use App\Models\Base\Partner as PartnerBase;
use App\Models\Partner;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function save(PartnerRequest $request): JsonResponse
    {
        $attributes = $request->all();
        if (!$attributes[Str::camel(PartnerBase::PAR_ID)]) {
            $attributes[Str::camel(PartnerBase::PAR_ID)] = Partner::getNextId();
        }
        $attributes = array_combine(array_map(fn($key) => Str::snake($key), array_keys($attributes)), $attributes);
        if ($request->route('uid')) {
            $partner = Partner::query()->find($request->route('uid'));
            $partner->update($attributes);
        } else {
            $partner = Partner::query()->create($attributes);
        }

        $request->session()->flash('successSaveMessage', __('partner.sikeres_mentes', ['uniqueName' => $partner->getUniqueName()]));
        return response()->json([
            'id' => $partner->getId(),
        ]);
    }
}
