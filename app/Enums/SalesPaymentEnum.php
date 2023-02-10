<?php

namespace App\Enums;

enum SalesPaymentEnum: string
{
    case PAID = 'paid';
    case UNPAID = 'unpaid';
}
