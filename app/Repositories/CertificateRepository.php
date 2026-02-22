<?php

namespace App\Repositories;

use App\Models\Certificate;
use App\Repositories\Interfaces\CertificateRepositoryInterface;

class CertificateRepository implements CertificateRepositoryInterface
{
    public function all()
    {
        return Certificate::orderBy('created_at', 'desc')->get();
    }

    public function find(int $id)
    {
        return Certificate::findOrFail($id);
    }
}
