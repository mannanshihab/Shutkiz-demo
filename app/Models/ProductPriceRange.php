<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceRange extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_id',
        'weight',
        'price',
    ];

    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
    
    public function product(){
        return $this->belongsToMany(Product::class);
    }
}
