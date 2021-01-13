<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnderCategories extends Model
{
    use HasFactory;

     protected $fillable = [
         'under_categories',
         'categories_id'
     ];

    public $timestamps = false;


}
