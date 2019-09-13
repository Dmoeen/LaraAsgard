<?php

namespace Modules\Usermanagement\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Usermanagement\Events\Handlers\RegisterUsermanagementSidebar;

class UsermanagementServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterUsermanagementSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('categories', array_dot(trans('usermanagement::categories')));
            // append translations

        });
    }

    public function boot()
    {
        $this->publishConfig('usermanagement', 'permissions');

        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Usermanagement\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\Usermanagement\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\Usermanagement\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Usermanagement\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
// add bindings

    }
}
