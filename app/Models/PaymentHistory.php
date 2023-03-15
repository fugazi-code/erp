<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable =[
        'sales_id',
        'transaction_type',
        'paid_amount',
        'received',
        'change',
        'stc_ref_no',
        'created_by',
        'email',
    ];
}
