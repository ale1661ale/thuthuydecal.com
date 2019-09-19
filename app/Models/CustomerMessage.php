<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerMessage extends Model
{
    protected $table = 'customer_messages';

    protected $fillable = [
        'id', 'name', 'email', 'phone', 'subject', 'message', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User','id_user','id');
    }
}
