<?php

namespace Modules\ProductManagement\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\ProductManagement\Events\Handlers\RegisterProductManagementSidebar;

class ProductManagementServiceProvider extends ServiceProvider
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
        $this->app['events']->listen(BuildingSidebar::class, RegisterProductManagementSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            $event->load('categories', array_dot(trans('productmanagement::categories')));
            $event->load('products', array_dot(trans('productmanagement::products')));
            $event->load('events', array_dot(trans('productmanagement::events')));
            $event->load('flavours', array_dot(trans('productmanagement::flavours')));
            $event->load('shapes', array_dot(trans('productmanagement::shapes')));
            $event->load('designs', array_dot(trans('productmanagement::designs')));
            $event->load('icings', array_dot(trans('productmanagement::icings')));
            $event->load('subcategories', array_dot(trans('productmanagement::subcategories')));
            $event->load('colors', array_dot(trans('productmanagement::colors')));
            // append translations









        });
    }

    public function boot()
    {
        $this->publishConfig('productmanagement', 'permissions');

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
            'Modules\ProductManagement\Repositories\CategoryRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentCategoryRepository(new \Modules\ProductManagement\Entities\Category());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheCategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\ProductRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentProductRepository(new \Modules\ProductManagement\Entities\Product());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheProductDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\EventRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentEventRepository(new \Modules\ProductManagement\Entities\Event());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheEventDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\FlavourRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentFlavourRepository(new \Modules\ProductManagement\Entities\Flavour());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheFlavourDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\ShapeRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentShapeRepository(new \Modules\ProductManagement\Entities\Shape());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheShapeDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\DesignRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentDesignRepository(new \Modules\ProductManagement\Entities\Design());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheDesignDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\IcingRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentIcingRepository(new \Modules\ProductManagement\Entities\Icing());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheIcingDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\SubcategoryRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentSubcategoryRepository(new \Modules\ProductManagement\Entities\Subcategory());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheSubcategoryDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\ProductManagement\Repositories\ColorRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentColorRepository(new \Modules\ProductManagement\Entities\Color());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheColorDecorator($repository);
            }
        );   $this->app->bind(
            'Modules\ProductManagement\Repositories\GlobalRepository',
            function () {
                $repository = new \Modules\ProductManagement\Repositories\Eloquent\EloquentGlobalRepository(new \Modules\ProductManagement\Entities\Color());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\ProductManagement\Repositories\Cache\CacheGlobalDecorator($repository);
            }
        );
// add bindings









    }
}
