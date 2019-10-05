<?php

namespace App\Providers;

use App\Contracts\GroupsContract;
use App\Repositories\GroupsRepository;
use App\Contracts\AdminsContract;
use App\Repositories\AdminsRepository;
use App\Contracts\UserGroupContract;
use App\Repositories\UserGroupRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    protected $repositories = [
        GroupsContract::class         =>          GroupsRepository::class,
        AdminsContract::class         =>          AdminsRepository::class,
        UserGroupContract::class      =>          UserGroupRepository::class,
    ];
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->repositories as $interface => $implementation)
        {
            $this->app->bind($interface, $implementation);
        }
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
