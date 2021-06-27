<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = ['name', 'description', 'slug', 'new_price', 'old_price', 'commission',
        'quantity', 'is_delivery', 'delivery_price', 'image', 'category_id', 'author', 'show'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function product()
    {
        return $this->belongsTo(User::class,'author');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }



}
