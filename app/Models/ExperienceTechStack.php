<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ExperienceTechStack extends Model
{
    protected $fillable = [
        'experience_id',
        'name',
        'icon',
        'color',
    ];

    public function experience(): BelongsTo
    {
        return $this->belongsTo(Experience::class);
    }
}
