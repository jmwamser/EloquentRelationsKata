<?php

namespace App\Enum;

enum UserRoleEnum: string
{
    case PARENT = 'parent';
    case CHILD = 'child';
}
