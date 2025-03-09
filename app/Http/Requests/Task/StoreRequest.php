<?php

namespace App\Http\Requests\Task;

use App\Task\Status;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'created_by' => 'required|exists:users,id',
            'status' => 'required|string|in:'.implode(',', array_map(fn ($case) => $case->value, Status::cases())),
            'due_date' => 'required|date',
            'assigned_to' => 'required|exists:users,id',
            'completed_at' => 'sometimes|date',
        ];
    }
}
