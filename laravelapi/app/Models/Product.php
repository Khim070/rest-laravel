<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'category_id',
        'image',
        'p_order',
        'active',
        'display',
    ];

    public function image(){
        return $this->belongsTo(Image::class, 'image', 'image_id');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function orderitem(){
        return $this->hasMany(OrderItem::class, 'name', 'id');
    }

    public function review(){
        return $this->hasMany(Review::class, 'name', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'name', 'id');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class, 'name', 'id');
    }
}
