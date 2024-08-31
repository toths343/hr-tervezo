<?php

namespace App\Http\Controllers;

use App\Abstracts\Entity;
use App\Http\Requests\EntityBorderdateRequest;
use App\Http\Requests\EntityMergeRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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

        return response()->json([]);
    }

    public function borderdateSave(EntityBorderdateRequest $entityBorderdateRequest): JsonResponse
    {
        $validated = $entityBorderdateRequest->validated();

        return response()->json([]);
    }

    public function deleteSave(Entity $entity): JsonResponse
    {
        current($entity->getEditorData())->delete();
        return response()->json([]);
    }

    public function edit(): JsonResponse
    {
        return response()->json([
            'html' => view(
                'entities.editor.' . $this->entity->getType(),
                $this->entity->getEditorData()
            )->render(),
        ]);
    }

    /** @deprecated  */
    public function save(Request $request): JsonResponse
    {
        /* @var FormRequest $entityRequest */
        $entityRequestClassName = '\App\Http\Requests\Entity\\' . ucfirst($this->entity->getType()) . 'Request';
        $entityRequest = (new $entityRequestClassName());
        $validator = Validator::make($request->all(), $entityRequest->rules(), $entityRequest->messages());
        if (!$validator->fails()) {
            /* @var Model $entityModelClass */
            $entityModelClassName = '\App\Models\\' . ucfirst($this->entity->getType());
            $entityModelClass = new $entityModelClassName;
            $attributes = $request->all();
            $attributes = array_combine(array_map(fn ($key) => Str::snake($key), array_keys($attributes)), $attributes);
            if ($this->entity->uid) {
                $entityModel = $entityModelClass::query()->find($this->entity->uid);
                $entityModel->update($attributes);
            } else {
                $entityModelClass::create($attributes);
            }
            return response()->json();
        } else {
            return response()->json(['errors' => $validator->messages()], 422);
        }
    }
}
