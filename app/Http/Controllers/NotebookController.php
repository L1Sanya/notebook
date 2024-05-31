<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Models\Notebook;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Throwable;

class NotebookController extends Controller
{
    public function getAll() : JsonResponse
    {
        $notebooks = Notebook::query()->paginate(10);
        return response()->json($notebooks);
    }

    public function store(CreateNotebookRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            $notebook = Notebook::query()->create($validatedData);

            return response()->json($notebook);
        } catch (Throwable $exception) {
            Log::info($exception->getMessage());
            return response()->json(['error' => 'An error occurred while creating the notebook'], 500);
        }
    }

    public function getById(int $id): JsonResponse
    {
        try {
            $notebook = Notebook::query()->findOrFail($id);

            return response()->json($notebook);
        } catch (Throwable) {
            return response()->json(['error' => 'Notebook not found'], 404);
        }
    }

    public function update(UpdateNotebookRequest $request, int $id): JsonResponse
    {
        $validatedData = $request->validated();

        $notebook = Notebook::query()->find($id);

        if (!$notebook) {
            return response()->json(['error' => 'Notebook not found'], 404);
        }

        $notebook->update($validatedData);

        return response()->json($notebook);
    }

    public function destroy(int $id): Application|Response|JsonResponse|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        $notebook = Notebook::query()->find($id);

        if (!$notebook) {
            return response()->json(['error' => 'Notebook not found'], 404);
        }

        $notebook->delete();

        return response(status: 204);
    }
}
