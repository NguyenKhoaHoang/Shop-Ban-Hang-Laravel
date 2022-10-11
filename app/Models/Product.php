<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brandProduct()
    {
        return $this->belongsTo(BrandProduct::class, 'brand_product_id');
    }

    public function categoryProduct()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_product_id');
    }
}
