<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected array $repositories = [
        [
            'model' => \App\Models\User::class,
            'interface' => \App\Repositories\Interfaces\UserRepositoryInterface::class,
            'repository' => \App\Repositories\UserRepository::class,
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
