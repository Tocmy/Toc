<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use App\Http\Middleware\Role\VerifyLevel;
use App\Http\Middleware\Role\VerifyPermission;
use App\Http\Middleware\Role\VerifyRole;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('role', VerifyRole::class);
        $router->aliasMiddleware('permission', VerifyPermission::class);
        $router->aliasMiddleware('level', VerifyLevel::class);
        $this->registerBladeExtensions();
    }

    /**
     * Register Blade extensions.
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        
        Blade::directive('role', function ($role) {
            return "if(Auth::check() && Auth::user()->hasRole({$role})): ";
        });

        Blade::directive('endrole', function ($role) {
            return "endif; ";
        });

        Blade::directive('permission', function ($permission) {
            return "if(Auth::check() && Auth::user()->hasPermission({$permission})): ";
        });

        Blade::directive('endpermission', function ($permission) {
            return 'endif;';
        });

        Blade::directive('level', function ($level) {
            $level = trim($level, '()');

            return "if(Auth::check() && Auth::user()->level() >= {$level}): ?>";
        });

        Blade::directive('endlevel', function ($level) {
            return 'endif;';
        });

        Blade::directive('allowed', function ($allowed) {
            return "if(Auth::check() && Auth::user()->allowed({$allowed})): ?>";
        });

        Blade::directive('endallowed', function ($allowed) {
            return 'php endif;';
        });
    }
}
