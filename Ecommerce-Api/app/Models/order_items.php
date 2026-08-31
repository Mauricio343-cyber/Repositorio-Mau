<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\orders;
use App\Models\products;


class order_items extends Model
{
    //
    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
    ];
    public function order()
    {
        return $this->belongsTo(orders::class);
    }
}
