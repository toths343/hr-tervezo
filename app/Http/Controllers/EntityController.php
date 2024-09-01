<?php

namespace App\Http\Controllers;

use App\Abstracts\Entity;
use App\Http\Requests\EntityBorderdateRequest;
use App\Http\Requests\EntityMergeRequest;
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

        if ($list->isEmpty()) {
            abort(404);
        }

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
            'canInsertBeforeFirst' => $this->entity->canInsertBeforeFirst(),
            'canInsertAfterLast' => $this->entity->canInsertAfterLast(),
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

    public function editModal(): JsonResponse
    {
        return response()->json([
            'html' => view(
                'entities.editor.' . $this->entity->getType(),
                $this->entity->getEditorData()
            )->render(),
        ]);
    }

    public function deleteModal(): JsonResponse
    {
        return response()->json([
            'html' => view('entity.modals.delete', [
                'uniqueName' => current($this->entity->getEditorData())->getUniqueName(),
            ])->render(),
        ]);
    }

    public function mergeSave(EntityMergeRequest $entityMergeRequest): JsonResponse
    {
        $validated = $entityMergeRequest->validated();
        session()->flash('successSaveMessage', __('entity.sikeres_szakasz_osszevonas'));
        return response()->json();
    }

    public function borderdateSave(EntityBorderdateRequest $entityBorderdateRequest): JsonResponse
    {
        $validated = $entityBorderdateRequest->validated();
        session()->flash('successSaveMessage', __('entity.sikeres_hatardatum_elmozgatas'));
        return response()->json();
    }

    public function deleteSave(Entity $entity): JsonResponse
    {
        $object = current($entity->getEditorData());
        $object->delete();
        session()->flash('successDeleteMessage', __('entity.sikeres_torles', ['uniqueName' => $object->getUniqueName()]));
        return response()->json();
    }
}
