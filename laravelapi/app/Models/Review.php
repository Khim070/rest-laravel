<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = "review";
    protected $primaryKey = "id";

    protected $fillable = [
        "user_id",
        "product_id",
        "rating",
        "comment",
        "display",
        "active"
    ];

    public function user(){
        return $this->belongsTo(UserModel::class, 'user_id', 'id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
