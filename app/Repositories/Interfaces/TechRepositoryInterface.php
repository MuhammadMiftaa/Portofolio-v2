<?php

namespace App\Repositories\Interfaces;

interface TechRepositoryInterface
{
    public function all();

    public function find(int $id);
}
