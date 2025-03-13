<?php

namespace App\Task;

use ArchTech\Enums\InvokableCases;

enum Status: string
{
    use InvokableCases;

    case TODO = 'todo';
    case IN_PROGRESS = 'doing';
    case DONE = 'done';
}
