<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Experience extends Model
{
    protected $fillable = [
        'title',
        'company',
        'description',
        'location',
        'website',
        'logo',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];

    public function techStacks(): HasMany
    {
        return $this->hasMany(ExperienceTechStack::class);
    }

    public function jobDescs(): HasMany
    {
        return $this->hasMany(ExperienceJobDesc::class);
    }
}
