<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content_Type extends Model
{
    protected $table = 'content_types';

    protected $fillable = [
        'id', 'name', 'slug', 'status'
    ];

    public function content()
    {
        return $this->hasMany('App\Models\Content', 'id_content_type', 'id');
    }
}
