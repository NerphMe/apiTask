<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Сategories extends Model
{
    use HasFactory;

    protected $table = 'Сategories';

    public function underCategories()
    {
        return $this->hasMany(UnderCategories::class, 'id','categories_id');
    }

    public function products()
    {
        return $this->hasMany(Products::class,'id','product_id');
    }
}
