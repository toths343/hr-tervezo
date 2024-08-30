<?php

namespace App\Http\Controllers;

use App\Abstracts\Entity;
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

    public function index(Entity $entity): View
    {
        $list = $entity->getEntityList();
        $data = [
            'title' => $entity->getBreadcrumbName(),
            'type' => $entity->getType(),
            'id' => $entity->id,
            'breadcrumbs' => [
                route('entity.list', ['type' => $entity->getType()]) => $entity->getBreadcrumbName(),
                '' => $list[0]->getUniqueName(),
            ],
            'list' => $entity->getEntityList(),
            'mergeable' => $entity->mergeable(),
        ];

        return view('entity.index', $data);
    }

    public function mergeModal(): JsonResponse
    {
        return response()->json([
            'html' => view('entity.modals.merge')->render(),
        ]);
    }

}
