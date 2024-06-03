<?php

namespace App\Enum;

enum AssignmentStatusEnum: string
{
    case TODO = 'todo';
    case PENDING = 'pending';
    case COMPLETED = 'completed';
}
