<?php

namespace App\Http\Requests\Task;

use App\Task\Status;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string|in:'.implode(',', array_map(fn ($case) => $case->value, Status::cases())),
            'due_date' => 'sometimes|date',
            'completed_at' => 'sometimes|date',
        ];
    }
}
