<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'images',
        'description',
        'is_active',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function created_by(){
        return $this->belongsTo(User::class);
    }
}
