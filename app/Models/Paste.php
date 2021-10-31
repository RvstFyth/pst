<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paste extends Model
{
    public $fillable = [
        'user_id',
        'paste',
        'token',
        'password',
        'expires'
    ];

    public $hidden = [
        'password',
        'token'
    ];
}
