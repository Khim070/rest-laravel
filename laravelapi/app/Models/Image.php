<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'image';
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'img',
    ];

    public function product(){
        return $this->hasMany(Product::class, 'img', 'image_id');
    }

    public function user(){
        return $this->hasMany(UserModel::class, 'img', 'image_id');
    }

}
