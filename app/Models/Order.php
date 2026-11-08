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
    'payment_status',
    'payment_reference',
'payment_transaction_id',
'paid_at',
'stock_released_at',
'payment_session_id',
];

protected function casts(): array
{
    return [
        'order_date' => 'datetime',
        'paid_at' => 'datetime',
        'stock_released_at' => 'datetime',
    ];
}

    public function users()
{
    return $this->belongsTo(Users::class, 'user_id', 'id');
}
   public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
