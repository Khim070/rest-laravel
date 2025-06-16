<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = "payment";
    protected $primaryKey = "id";

    protected $fillable = [
        "order_id",
        "user_id",
        "amount",
        "payment_method",
        "status",
        "active",
        "display",
    ];

    public function orderproduct(){
        return $this->belongsTo(OrderProduct::class, 'order_id', 'id');
    }

    public function user(){
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }
}
