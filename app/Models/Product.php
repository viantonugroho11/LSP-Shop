<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $increment = false;

    protected  $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'image',
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category::class);
    }
}
