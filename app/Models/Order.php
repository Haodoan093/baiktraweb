<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'address','phone','total_price'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
