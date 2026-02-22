<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ExperienceRepositoryInterface;

class ExperienceController extends Controller
{
    protected $experienceRepository;

    public function __construct(ExperienceRepositoryInterface $experienceRepository)
    {
        $this->experienceRepository = $experienceRepository;
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Experience retrieved successfully',
            'data' => $this->experienceRepository->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Experience retrieved successfully',
            'data' => $this->experienceRepository->find($id)
        ]);
    }
}
