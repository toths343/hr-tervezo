<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;
use App\Models\Partner;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function index(PartnerDataTable $dataTable)
    {
        $data['breadcrumbs'] = ['' => 'Partnerek'];
        return $dataTable->render('partner.index', $data);
    }

    public function detail(int $id): View
    {
        /* @var Partner[] $partners */
        $partners = Partner::query()->where(Partner::PAR_ID, $id)->orderBy(Partner::PAR_HATKEZD)->get();
        $data['partners'] = $partners;
        $data['breadcrumbs'] = [route('partner.index') => 'Partnerek', '' => $data['partners'][0]->getUniqueName()];
        return view('partner.detail', $data);
    }
}
