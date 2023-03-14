<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'qty',
        'name',
        'sku',
        'price',
        'sub_total',
        'orderable_id',
        'orderable_type'
    ];
    
    public function orderable()
    {
        return $this->morphTo();
    }
}
