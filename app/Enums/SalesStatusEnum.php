<?php

namespace App\Enums;

enum SalesStatusEnum: string
{
    case COMPLETED = 'completed';
    case INPROGRESS = 'in-progress';
    case TAKEOUT = 'take-out';
    case VOID = 'void';
}
