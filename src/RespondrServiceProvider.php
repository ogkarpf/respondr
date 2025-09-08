<?php

namespace ogkarpf\respondr;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ogkarpf\respondr\Middleware\AppendApiVersion;

class RespondrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('respondr')
            ->hasConfigFile('respondr');
    }

    public function boot()
    {
        $router = $this->app['router'];
        $router->aliasMiddleware('api.version', AppendApiVersion::class);
        $router->pushMiddlewareToGroup('api', AppendApiVersion::class);

        $this->publishes([
            __DIR__.'/../config/respondr.php' => config_path('respondr.php'),
        ], 'respondr-config');
    }
}
