<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienceJobDesk extends Model
{
    protected $fillable = [
        'experience_id',
        'title',
        'description',
    ];

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}
