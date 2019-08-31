<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'id', 'name', 'slug', 'status',
    ];

    public function Product()
    {
        return $this->hasMany('App\Models\Product', 'id_cate', 'id');
    }

    public function productType()
    {
        return $this->hasMany('App\Models\Product_Type', 'id_protype', 'id');
    }
}
