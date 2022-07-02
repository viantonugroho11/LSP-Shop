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
        'author',
        'book_id',
        'slug',
        'description',
        'price',
        'publisher',
        'isbn',
        'language',
        'datePublish',
        'page',
        'weight',
        'width',
        'category_id',
        'image',
        'quantity',
    ];

    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function getPrice()
    {
        return 'Rp. ' . number_format($this->price, 0, ',', '.');
    }
    public function getImage()
    {
        return Storage::url('public/product/' . $this->image);
    }
    public function getQuantity()
    {
        return $this->quantity . ' pcs';
    }
    public function getDatePublish()
    {
        return date('d F Y', strtotime($this->datePublish));
    }
    public function getWeight()
    {
        return $this->weight . ' g';
    }
    public function getWidth()
    {
        return $this->width . ' cm';
    }
    public function getPage()
    {
        return $this->page . ' pages';
    }
}
