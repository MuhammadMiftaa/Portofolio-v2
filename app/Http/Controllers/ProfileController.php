<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProfileRepositoryInterface;

class ProfileController extends Controller
{
    protected $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Profile retrieved successfully',
            'data' => $this->profileRepository->all()
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'status' => true,
            'statusCode' => 200,
            'message' => 'Profile retrieved successfully',
            'data' => $this->profileRepository->find($id)
        ]);
    }
}
