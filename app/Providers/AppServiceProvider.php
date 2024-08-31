<?php

namespace App\Providers;

use App\Abstracts\Entity;
use Illuminate\Contracts\Container\BindingResolutionException;
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
            try {
                return $this->app->make('\App\Entities\\' . $entityType . 'Entity', [
                    'uid' => request()->route('uid'),
                    'id' => request()->route('id')
                ]);
            } catch (BindingResolutionException) {
                abort(404);
            }
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
