<?php

namespace ogkarpf\respondr;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use ogkarpf\respondr\Commands\RespondrCommand;
use ogkarpf\respondr\Middleware\AppendApiVersion;

class RespondrServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('respondr')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_migration_table_name_table')
            ->hasCommand(RespondrCommand::class);
    }

    public function boot()
    {
        $router = $this->app['router'];

        // Alias für optionale Nutzung
        $router->aliasMiddleware('api.version', AppendApiVersion::class);

        // Global für alle API-Routen hinzufügen
        $router->pushMiddlewareToGroup('api', AppendApiVersion::class);
    }
}
