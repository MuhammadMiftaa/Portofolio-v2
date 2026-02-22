<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\CertificateRepositoryInterface;

class CertificateController extends Controller
{
    protected $certificateRepository;

    public function __construct(CertificateRepositoryInterface $certificateRepository)
    {
        $this->certificateRepository = $certificateRepository;
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Certificate retrieved successfully',
            'data' => $this->certificateRepository->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Certificate retrieved successfully',
            'data' => $this->certificateRepository->find($id)
        ]);
    }
}
