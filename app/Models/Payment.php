<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{   

    public $table = 'payments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'vendor_id',
        'customer_id',
        'order_id',
        'payment_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');

    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');

    }
}
