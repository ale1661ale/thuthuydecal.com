<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = [
        'quantity', 'amount', 'message', 'status', 'id_order', 'id_product'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id_order', 'id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
