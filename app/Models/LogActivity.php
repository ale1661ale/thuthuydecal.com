<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogActivity extends Model
{
    protected $fillable = [
        'subject', 'url', 'method', 'ip', 'agent', 'id_user'
    ];
}
