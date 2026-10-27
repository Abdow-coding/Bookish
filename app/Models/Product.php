<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
     protected $fillable = [
        'user_id',
        'cover',
        'title',
        'author',
        'category',
        'price',
        'stock',
        'condition',
        'status',
        'description'
    ];

    public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}

public function cart(){
    return $this->hasMany(Cart::class);
}
public function user()
{
    return $this->belongsTo(User::class,'user_id');
}
}
