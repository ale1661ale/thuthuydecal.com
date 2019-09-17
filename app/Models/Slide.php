<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    protected $table = 'slides';

    protected $fillable = [
        'id', 'name', 'slug', 'link', 'image', 'description', 'content', 'status', 'id_image_type',
    ];

    public function imageType()
    {
        return $this->belongsTo('App\Models\Image_Type', 'id_image_type', 'id');
    }
}
