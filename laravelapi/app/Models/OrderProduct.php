<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $table = 'order_product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'active'
    ];

    public function user(){
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function orderitem(){
        return $this->hasMany(OrderItem::class, 'status', 'id');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'status', "id");
    }
}
