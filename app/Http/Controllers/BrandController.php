<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\BrandRepositoryInterface;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * BrandRepository instance.
     *
     * @var BrandRepositoryInterface
     */
    private BrandRepositoryInterface $repository;

    /**
     * Create new controller instance.
     *
     * @param BrandRepositoryInterface $repository
     */
    public function __construct(BrandRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * List all resource.
     *
     * @return void
     */
    public function index()
    {
        $brands = $this->repository->getAllByOwner(
            auth()->user()
        );

        return view('brands.index', compact('brands'));
    }

    /**
     * Show resource.
     *
     * @return void
     */
    public function show(string $id)
    {
        $brand = $this->repository->find($id);

        return view('brands.show', compact('brand'));
    }
}
