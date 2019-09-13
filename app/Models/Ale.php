<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ale extends Model
{
    protected $table = 'ales';

    protected $fillable = [
        'id', 'title', 'key_name', 'description', 'image', 'content', 'status',
    ];
}
