<?php

namespace App\Repositories;

use App\Models\Profile;
use App\Repositories\Interfaces\ProfileRepositoryInterface;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function all()
    {
        return Profile::orderBy('created_at', 'desc')->get();
    }

    public function find(int $id)
    {
        return Profile::findOrFail($id);
    }
}
