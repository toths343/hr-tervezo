<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;

class Partner extends Controller
{
    public function index(PartnerDataTable $dataTable)
    {
        return $dataTable->render('partner.index');
    }

}
