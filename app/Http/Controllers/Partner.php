<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;
use Illuminate\View\View;

class Partner extends Controller
{
    public function index(PartnerDataTable $dataTable)
    {
        return $dataTable->render('partner.index');
    }

    public function detail(): View
    {
        return view('partner.detail');
    }
}
