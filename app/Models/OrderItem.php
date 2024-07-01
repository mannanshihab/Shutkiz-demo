<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'weight',
        'priceRange_id',
        'quantity',
        'unit_amount',
        'total_amount',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function product(){
        return $this->belongsTo(Product::class)->where('is_active', 1);
    }

    public function weight(){
        return $this->belongsTo(ProductPriceRange::class);
    }


}
