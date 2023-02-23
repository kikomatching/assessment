<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Model/Interface/Repository implementation.
     */
    protected array $repositories = [
        [
            'model' => \App\Models\User::class,
            'interface' => \App\Repositories\Interfaces\UserRepositoryInterface::class,
            'repository' => \App\Repositories\UserRepository::class,
        ],
        [
            'model' => \App\Models\Brand::class,
            'interface' => \App\Repositories\Interfaces\BrandRepositoryInterface::class,
            'repository' => \App\Repositories\BrandRepository::class,
        ],
        [
            'model' => \App\Models\Store::class,
            'interface' => \App\Repositories\Interfaces\StoreRepositoryInterface::class,
            'repository' => \App\Repositories\StoreRepository::class,
        ],
        [
            'model' => \App\Models\Journal::class,
            'interface' => \App\Repositories\Interfaces\JournalRepositoryInterface::class,
            'repository' => \App\Repositories\JournalRepository::class,
        ],
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        collect($this->repositories)->each(
            fn($implementation) => $this->app->bind(
                $implementation['interface'], 
                fn($app) => new $implementation['repository']($app->make($implementation['model']))
            )
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
