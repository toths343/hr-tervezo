<?php

namespace App\Providers;

use App\Abstracts\Entity;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Entity::class, function () {
            $entityType = ucfirst(request()->route('type'));
            return $this->app->get('\App\Entities\\' . $entityType);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
