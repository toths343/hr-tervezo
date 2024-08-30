<?php

namespace App\Http\Controllers;

use App\Abstracts\Entity;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;


class EntityController extends Controller
{

    public function __construct(private readonly Entity $entity)
    {
    }

    public function list(): View|JsonResponse
    {
        $data = [
            'title' => $this->entity->getBreadcrumbName(),
            'breadcrumbs' => [
                '' => $this->entity->getBreadcrumbName(),
            ],
        ];
        return $this->entity->getDatatable()->render('entity.list', $data);
    }

    public function index(): View
    {
        $list = $this->entity->getEntityList();
        $data = [
            'title' => $this->entity->getBreadcrumbName(),
            'type' => $this->entity->getType(),
            'id' => $this->entity->id,
            'breadcrumbs' => [
                route('entity.list', ['type' => $this->entity->getType()]) => $this->entity->getBreadcrumbName(),
                '' => $list[0]->getUniqueName(),
            ],
            'list' => $this->entity->getEntityList(),
            'mergeable' => $this->entity->mergeable(),
        ];

        return view('entity.index', $data);
    }

    public function mergeModal(): JsonResponse
    {
        return response()->json([
            'html' => view('entity.modals.merge', [
                'mergeableDates' => $this->entity->getMergeableDates(),
            ])->render(),
        ]);
    }

    public function borderdateModal(): JsonResponse
    {
        return response()->json([
            'html' => view('entity.modals.borderdate', [
                'mergeableDates' => $this->entity->getMergeableDates(),
            ])->render(),
        ]);
    }

}
