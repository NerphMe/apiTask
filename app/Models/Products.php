<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable =
        [
            'name',
            'description',
        ];

    public function categories()
    {
        return $this->hasOne(Сategories::class, 'product_id','id');
    }
    public function underCategories()
    {
        return $this->hasOne(UnderCategories::class, 'categories_id','id');
    }

    public $timestamps = false;
}
