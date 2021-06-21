<?php

namespace App;

use App\Http\Traits\Generic;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Generic;
    protected $fillable = [
        'price',
        'quantity',
        'total_price',
        'shipping_address',
        'order_status_id',
        'product_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class);
    }

    public function getDateAttribute($val){
        return $this->getCustomizeDate($this->created_at);
    }
}