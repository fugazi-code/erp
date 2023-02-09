<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "supplier_id",
        "sale_date",
        "order_tax",
        "discount",
        "shipping",
        "status",
    ];

    public function orders()
    {
        return $this->morphMany(OrderDetail::class, 'orderable');
    }
}
