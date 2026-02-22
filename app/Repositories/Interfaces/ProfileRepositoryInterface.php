<?php

namespace App\Repositories\Interfaces;

interface ProfileRepositoryInterface
{
    public function all();

    public function find(int $id);
}
