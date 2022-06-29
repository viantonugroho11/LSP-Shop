<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranscationDetail extends Model
{
    use HasFactory;

    protected $increment = false;
    protected $fillable = [
        'id',
        'product_id',
        'transcation_id',
        'quantity',
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class);
    }
    public function getTranscation(){
        return $this->belongsTo(Transcation::class);
    }
    public function getPrice($price){
        return 'Rp. ' . number_format($this->quantity * $price, 0, ',', '.');
    }

}
