<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasOne(Payment::class);

    }
    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity', 'price');
    }

    
}
