<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Attachment extends Model
{
    protected $fillable = [
        'task_id',
        'file_path',
        'file_type',
    ];

    public function tasks(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
