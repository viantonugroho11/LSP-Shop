<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transcation extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $fillable = [
        'id',
        'transaction_id',
        'user_id',
        'address',
        'quantity',
        'va_number',
        'total_price',
        'pdf',
        'status'.
        'courier',
        'courier_service',
        'courier_tracking_number',
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }
    public function getPrice()
    {
        return 'Rp. ' . number_format($this->total_price, 0, ',', '.');
    }
}
