<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $table='orders';
    protected $fillable = [
    'user_id',
    'total_price',
    'order_date',
    'first_name',
    'last_name',
    'phone',
    'country',
    'city',
    'address',
    'address_details',
    'notes',
    'status',
    'payment_method',
    'payment_status'
];



    public function users(){
        return $this->belongsTo(Users::class);
    }
   public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
