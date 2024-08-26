<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;
use Illuminate\View\View;

class Partner extends Controller
{
    public function index(PartnerDataTable $dataTable): View
    {
        return $dataTable->render('partner.index');
    }

}
