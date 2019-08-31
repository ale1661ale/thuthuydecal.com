<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_Type extends Model
{
    protected $table = 'product_types';

    protected $fillable = [
        'id', 'name', 'slug', 'col_val', 'hot', 'id_cate', 'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_cate', 'id');
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id_protype', 'id');
    }
}
