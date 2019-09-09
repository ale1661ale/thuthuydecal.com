<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Introduce extends Model
{
    protected $table = 'introduces';
    
    protected $fillable = [
        'id', 'title', 'slug', 'image', 'description', 'content', 'status',
    ];
}
