<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    public $incrementing = false;

    protected  $fillable = [
        'id',
        'name',
        'slug',
        'description',
        'price',
        'category_id',
        'image',
        'quantity',
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category::class);
    }
    public function getPrice()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }
    public function getImage()
    {
        return Storage::url($this->image);
    }
}
