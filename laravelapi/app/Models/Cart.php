<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = "cart";
    protected $primaryKey = "id";

    protected $fillable = [
        "user_id",
        "product_id",
        "quantity",
        "active"
    ];

    public function user(){
        return $this->belongsTo(UserModel::class, "user_id", "id");
    }

    public function product(){
        return $this->belongsTo(Product::class, "product_id", "id");
    }
}
