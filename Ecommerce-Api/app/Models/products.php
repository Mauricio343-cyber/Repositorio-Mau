<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    //
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_stock',
    ];

    public function orderItems()
    {
        return $this->hasMany(order_items::class);
    }

}
