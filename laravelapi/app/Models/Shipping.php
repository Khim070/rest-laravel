<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = "shipping";
    protected $primaryKey = "id";

    protected $fillable = [
        "order_id",
        "user_id",
        "address",
        "status",
        "tracking_number",
        "active",
        "display"
    ];

    public function orderproduct(){
        return $this->belongsTo(OrderProduct::class, "order_id", "id");
    }

    public function user(){
        return $this->belongsTo(UserModel::class, "user_id", "id");
    }
}
