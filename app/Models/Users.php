<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    protected $table = 'table_users';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function Orders(){
        return $this->hasMany(Order::class);
    }

    public function products():HasMany{
        return $this->hasMany(Product::class,'user_id');
    }
}
