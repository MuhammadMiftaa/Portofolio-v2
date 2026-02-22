<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProjectRepositoryInterface;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepositoryInterface $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Project retrieved successfully',
            'data' => $this->projectRepository->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Project retrieved successfully',
            'data' => $this->projectRepository->find($id)
        ]);
    }
}
