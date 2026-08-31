<?php

namespace App\Models;

use Database\Factories\ordersfactoryFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\order_items;
use App\Models\payments;



class orders extends Model
{
    use HasFactory;


    protected $fillable = [
        'orders_id',
        'user_id',
        'total_amount',
        'status',
        'order_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function orderItems()
    {
        return $this->hasMany(order_items::class);
    }

    public function payment()
    {
        return $this->hasOne(payments::class);
    }
}