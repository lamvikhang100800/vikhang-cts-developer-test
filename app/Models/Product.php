<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'tbl_product';

    public function category()
    {
        return $this->hasOne(Category::class , 'id' , 'category_id');
    }
}
