<?php

namespace App\Providers;

use App\Repository\Products\Interfaces\ProductsRepositoryInterface;
use App\Repository\Products\ProductsRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProductsRepositoryInterface::class, ProductsRepository::class);
    }

    public function boot(): void { }
}
