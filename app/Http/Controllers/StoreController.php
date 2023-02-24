<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\StoreRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StoreController extends Controller
{
    /**
     * StoreRepository instance.
     *
     * @var StoreRepositoryInterface
     */
    private StoreRepositoryInterface $repository;

    /**
     * Create new controller instance.
     *
     * @param StoreRepositoryInterface $repository
     */
    public function __construct(StoreRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all resource data.
     *
     * @return void
     */
    public function index()
    {
        $stores = $this->repository->getAllByOwner(auth()->user());

        return view('stores.index', compact('stores'));
    }

    /**
     * List all resource data.
     *
     * @return void
     */
    public function show(string $id)
    {
        $store = $this->repository->find($id);

        return view('stores.show', compact('store'));
    }
}
