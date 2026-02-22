<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'fullname',
        'nickname',
        'title',
        'bio',
        'location',
        'website',
        'email',
        'linkedin',
        'github',
        'phone',
        'codewars',
        'leetcode',
        'languages',
    ];
}
