<?php

namespace App;

use App\Http\Traits\Generic;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Generic;
    protected $fillable = [
        'address_id',
        'order_status_id',
        'user_id',
        'total_price',
        'completed_at'
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

    public function getCompletedAtAttribute($val){
        return $this->getCustomizeDateAndTime($val);
    }

    public function order_products(){
        return $this->hasMany(OrderProduct::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

}
