<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'contents';

    protected $fillable = [
        'id', 'title', 'slug', 'image', 'description', 'content', 'status', 'id_content_type'
    ];

    public function contentType()
    {
        return $this->belongsTo('App\Models\Content_Type', 'id_content_type', 'id');
    }
}
