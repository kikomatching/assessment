<?php

namespace App\Http\Controllers\Api\V1\Owners;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource;
use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreController extends Controller
{
    /**
     * @var StoreRepositoryInterface
     */
    private StoreRepositoryInterface $repository;

    /**
     * Create new controller
     *
     * @param StoreRepositoryInterface $repository
     */
    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all Stores.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResource
    {
        return new StoreResource(
            $this->repository->getAllByOwner(auth()->user())
        );
    }
}
