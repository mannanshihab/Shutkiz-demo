<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'is_active',
        'is_featured',
        'is_stack',
        'on_sale',
    ];
    protected $casts = [
        'images' => 'array',
    ];
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    public function ProductPrice(){
        return $this->hasMany(ProductPriceRange::class);
    }

}
