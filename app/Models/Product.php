<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'id', 'name', 'slug', 'image', 'quantity', 'price', 'promotion', 'description', 'content', 'col_val', 'hot', 'key_word', 'id_cate', 'status', 'sold_out' , 'id_protype' 
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'id_cate', 'id');
    }

    public function productType()
    {
        return $this->belongsTo('App\Models\Product_Type', 'id_protype', 'id');
    }
}
