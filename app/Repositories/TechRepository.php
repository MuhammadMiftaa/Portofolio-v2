<?php

namespace App\Repositories;

use App\Models\Tech;
use App\Repositories\Interfaces\TechRepositoryInterface;

class TechRepository implements TechRepositoryInterface
{
    public function all()
    {
        return Tech::orderBy('created_at', 'desc')->get();
    }

    public function find(int $id)
    {
        return Tech::findOrFail($id);
    }
}
