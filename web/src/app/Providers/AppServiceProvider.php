<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Auth\Resolvers\SocialUserResolver;
use Adaojunior\Passport\SocialUserResolverInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SocialUserResolverInterface::class, SocialUserResolver::class);
    }
}
