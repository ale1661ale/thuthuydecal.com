<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class logo extends Model
{
    protected $table = 'logos';

    protected $fillable = [
        'id', 'name', 'slug', 'link', 'image', 'description', 'status', 'id_image_type',
    ];

    public function imageType()
    {
        return $this->belongsTo('App\Models\Image_Type', 'id_image_type', 'id');
    }
}
