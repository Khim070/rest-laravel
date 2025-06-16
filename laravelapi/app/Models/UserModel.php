<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'image',
        'email',
        'password',
        'phone',
        'address',
        'role',
        'active'
    ];

    public function image(){
        return $this->belongsTo(Image::class, 'image', 'image_id');
    }

    public function orderproduct(){
        return $this->hasMany(OrderProduct::class, 'name', 'id');
    }

    public function payment(){
        return $this->hasMany(Payment::class, 'name', 'id');
    }

    public function review(){
        return $this->hasMany(Review::class, 'name', 'id');
    }

    public function cart(){
        return $this->hasMany(Cart::class, 'name', 'id');
    }

    public function shipping(){
        return $this->hasMany(Shipping::class, 'name', 'id');
    }

    public function wishlist(){
        return $this->hasMany(Wishlist::class, 'name', "id");
    }
}
