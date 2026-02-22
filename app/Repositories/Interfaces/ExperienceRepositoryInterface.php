<?php

namespace App\Repositories\Interfaces;

interface ExperienceRepositoryInterface
{
    public function all();

    public function find(int $id);
}
