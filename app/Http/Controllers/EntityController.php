<?php

namespace App\Http\Controllers;

use App\Interfaces\Entity;
use Illuminate\View\View;

class EntityController extends Controller
{
    public function index(Entity $entity, string $type, int $id): View
    {
        $list = $entity->getEntityList($id);
        $data = [
            'title' => $entity->getBreadcrumbName(),
            'type' => $type,
            'breadcrumbs' => [
                route('partner.index') => $entity->getBreadcrumbName(),
                '' => $list[0]->getUniqueName(),
            ],
            'list' => $entity->getEntityList($id),
        ];

        return view('entity.index', $data);
    }

}
