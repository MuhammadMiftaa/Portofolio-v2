<?php

namespace App\Repositories\Interfaces;

interface CertificateRepositoryInterface
{
    public function all();

    public function find(int $id);
}
