<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'id', 'name', 'phone', 'address', 'active', 'id_user'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
}
