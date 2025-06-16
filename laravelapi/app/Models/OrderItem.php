<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'subtotal',
        'active'
    ];

    public function orderproduct(){
        return $this->belongsTo(OrderProduct::class, 'order_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function shipping(){
        return $this->hasMany(Shipping::class, 'quantity', 'id');
    }
}
