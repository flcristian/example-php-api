<?php

namespace App\Providers;

use App\Http\Controllers\Products\Interfaces\ProductsControllerInterface;
use App\Http\Controllers\Products\ProductsController;
use App\Repository\Products\Interfaces\ProductsRepositoryInterface;
use App\Repository\Products\ProductsRepository;
use App\Services\Products\Interfaces\ProductsCommandServiceInterface;
use App\Services\Products\Interfaces\ProductsQueryServiceInterface;
use App\Services\Products\ProductsCommandService;
use App\Services\Products\ProductsQueryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
        $this->app->bind(ProductsQueryServiceInterface::class, ProductsQueryService::class);
        $this->app->bind(ProductsCommandServiceInterface::class, ProductsCommandService::class);
        $this->app->bind(ProductsControllerInterface::class, ProductsController::class);
    }

    public function boot(): void { }
}
