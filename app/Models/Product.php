<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'serial_number',
        'description',
        'quantity',
        'feactured'
    ];
    public function order_items()
    {
        return $this->belongsTo(Order_items::class);
    }
}
