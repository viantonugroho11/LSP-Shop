<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranscationCart extends Model
{
    use HasFactory;

    protected $increment = false;
    protected $fillable = [
        'id',
        'quantity',
        'user_id',
        'product_id',
    ];
    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
    public function getProduct()
    {
        return $this->belongsTo(Product::class);
    }
    public function getPrice($price){
        return 'Rp. ' . number_format($this->quantity * $price, 0, ',', '.');
    }
}
