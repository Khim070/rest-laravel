<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "category";
    protected $primaryKey = "id";

    protected $fillable = ['name', 'active'];

    public function product(){
        return $this->hasMany(Product::class, 'name', 'id');
    }
}
