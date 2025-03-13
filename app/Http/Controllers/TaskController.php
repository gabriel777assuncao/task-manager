<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\{StoreRequest, UpdateRequest};
use App\Models\Task;
use Illuminate\Http\{JsonResponse};

class TaskController extends Controller
{
    public function index(): JsonResponse
    {
        $tasks = Task::query()->where('created_by', auth()->id())->simplePaginate(10);

        return response()->json($tasks);
    }

    public function show(Task $task): JsonResponse
    {
        $task = Task::find($task->id);

        return response()->json($task);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        $task = Task::create($request->validated());

        return response()->json($task, 201);
    }

    public function update(UpdateRequest $request, Task $task): JsonResponse
    {
        $task->update($request->validated());

        return response()->json($task);
    }

    public function destroy(Task $task): JsonResponse
    {
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }
}
