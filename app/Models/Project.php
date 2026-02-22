<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $fillable = [
        'title',
        'description',
        'url',
        'github_link',
        'web_view_image',
        'mobile_view_image',
        'show',
    ];

    protected $casts = [
        'show' => 'boolean',
    ];

    public function techStacks(): HasMany
    {
        return $this->hasMany(ProjectTechStack::class);
    }
}
