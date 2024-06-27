<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'image',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by',
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    

}
