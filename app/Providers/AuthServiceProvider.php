<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Route::group([
            'as' => 'passport.',
            'middleware' => [
                InitializeTenancyByDomain::class, // Use tenancy initialization middleware of your choice
                PreventAccessFromCentralDomains::class,
            ],
            'prefix' => config('passport.path', 'oauth'),
            'namespace' => 'Laravel\Passport\Http\Controllers',
        ], function () {
            $this->loadRoutesFrom(__DIR__ . "/../../vendor/laravel/passport/src/../routes/web.php");
        });

        $this->tokencan();
    }

    public function register(): void
    {
        Passport::ignoreRoutes();
    }

    public function tokencan(): void
    {
        $roles = [
            'admin' => 'Admin',
            'user' => 'User',
        ];
        
        Passport::tokensCan($roles);
    }
}
