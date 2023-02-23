<?php

namespace App\Http\Controllers\Api\V1\Owners;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    /**
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $repository;

    /**
     * Create new controller instance.
     */
    public function __construct(UserRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    /**
     * Undocumented function
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            $this->repository->all()
        ]);
    }
}
