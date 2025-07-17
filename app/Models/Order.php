<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /** @use HasFactory<\Database\Factories\OrderFactory> */
    use HasFactory;

    protected $table = 'order';

    public function orderItems(){
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function orderPaymentMethods(){
        return $this->hasMany(OrderPaymentMethod::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
