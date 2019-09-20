<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class banner extends Model
{
    protected $table = 'banners';

    protected $fillable = [
        'id', 'name', 'slug', 'link', 'image', 'description', 'key_name', 'status', 'id_image_type',
    ];

    public function imageType()
    {
        return $this->belongsTo('App\Models\Image_Type', 'id_image_type', 'id');
    }
}
