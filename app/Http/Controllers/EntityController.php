<?php

namespace App\Http\Controllers;

use App\Interfaces\Entity;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class EntityController extends Controller
{

    public function list(Entity $entity): View|JsonResponse
    {
        $data = [
            'title' => $entity->getBreadcrumbName(),
            'breadcrumbs' => [
                '' => $entity->getBreadcrumbName(),
            ],
        ];
        return $entity->getDatatable()->render('entity.list', $data);
    }

    public function index(Entity $entity, string $type, int $id): View
    {
        $list = $entity->getEntityList($id);
        $data = [
            'title' => $entity->getBreadcrumbName(),
            'type' => $type,
            'breadcrumbs' => [
                route('entity.list', ['type' => $type]) => $entity->getBreadcrumbName(),
                '' => $list[0]->getUniqueName(),
            ],
            'list' => $entity->getEntityList($id),
        ];

        return view('entity.index', $data);
    }

}
