<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title',
        'program',
        'issuer',
        'issued_at',
        'expires_at',
        'image',
        'show',
    ];

    protected $casts = [
        'issued_at'  => 'date',
        'expires_at' => 'date',
        'show'       => 'boolean',
    ];
}
