<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class image_type extends Model
{
    protected $table = 'image_types';

    protected $fillable = [
        'id', 'name', 'slug', 'status'
    ];
}
