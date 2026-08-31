<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\orders;
use App\Models\products;


class payments extends Model
{
    //
    protected $fillable = [
        'order_id',
        'amount',
        'status',
    ];
    public function order()
    {
        return $this->belongsTo(orders::class);
    }
}
