<?php

namespace App\Repositories\Interfaces;

interface ProjectRepositoryInterface
{
    public function all();

    public function find(int $id);
}
