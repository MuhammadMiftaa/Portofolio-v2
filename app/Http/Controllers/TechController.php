<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\TechRepositoryInterface;

class TechController extends Controller
{
    protected $techRepository;

    public function __construct(TechRepositoryInterface $techRepository)
    {
        $this->techRepository = $techRepository;
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Technology retrieved successfully',
            'data' => $this->techRepository->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Technology retrieved successfully',
            'data' => $this->techRepository->find($id)
        ]);
    }
}
