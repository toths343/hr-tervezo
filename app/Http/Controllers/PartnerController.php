<?php

namespace App\Http\Controllers;

use App\DataTables\PartnerDataTable;

class PartnerController extends Controller
{
    public function index(PartnerDataTable $dataTable)
    {
        $data['breadcrumbs'] = ['' => 'Partnerek'];
        return $dataTable->render('partner.index', $data);
    }

}
