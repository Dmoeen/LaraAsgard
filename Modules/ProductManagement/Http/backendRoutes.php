<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/productmanagement'], function (Router $router) {
    $router->bind('category', function ($id) {
        return app('Modules\ProductManagement\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.productmanagement.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:productmanagement.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.productmanagement.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:productmanagement.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.productmanagement.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:productmanagement.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.productmanagement.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:productmanagement.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.productmanagement.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:productmanagement.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.productmanagement.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:productmanagement.categories.destroy'
    ]);
    $router->bind('product', function ($id) {
        return app('Modules\ProductManagement\Repositories\ProductRepository')->find($id);
    });
    $router->get('products', [
        'as' => 'admin.productmanagement.product.index',
        'uses' => 'ProductController@index',
        'middleware' => 'can:productmanagement.products.index'
    ]);
    $router->get('products/create', [
        'as' => 'admin.productmanagement.product.create',
        'uses' => 'ProductController@create',
        'middleware' => 'can:productmanagement.products.create'
    ]);
    $router->post('products', [
        'as' => 'admin.productmanagement.product.store',
        'uses' => 'ProductController@store',
        'middleware' => 'can:productmanagement.products.create'
    ]);
    $router->get('products/{product}/edit', [
        'as' => 'admin.productmanagement.product.edit',
        'uses' => 'ProductController@edit',
        'middleware' => 'can:productmanagement.products.edit'
    ]);
    $router->put('products/{product}', [
        'as' => 'admin.productmanagement.product.update',
        'uses' => 'ProductController@update',
        'middleware' => 'can:productmanagement.products.edit'
    ]);
    $router->delete('products/{product}', [
        'as' => 'admin.productmanagement.product.destroy',
        'uses' => 'ProductController@destroy',
        'middleware' => 'can:productmanagement.products.destroy'
    ]);
    $router->bind('event', function ($id) {
        return app('Modules\ProductManagement\Repositories\EventRepository')->find($id);
    });
    $router->get('events', [
        'as' => 'admin.productmanagement.event.index',
        'uses' => 'EventController@index',
        'middleware' => 'can:productmanagement.events.index'
    ]);
    $router->get('events/create', [
        'as' => 'admin.productmanagement.event.create',
        'uses' => 'EventController@create',
        'middleware' => 'can:productmanagement.events.create'
    ]);
    $router->post('events', [
        'as' => 'admin.productmanagement.event.store',
        'uses' => 'EventController@store',
        'middleware' => 'can:productmanagement.events.create'
    ]);
    $router->get('events/{event}/edit', [
        'as' => 'admin.productmanagement.event.edit',
        'uses' => 'EventController@edit',
        'middleware' => 'can:productmanagement.events.edit'
    ]);
    $router->put('events/{event}', [
        'as' => 'admin.productmanagement.event.update',
        'uses' => 'EventController@update',
        'middleware' => 'can:productmanagement.events.edit'
    ]);
    $router->delete('events/{event}', [
        'as' => 'admin.productmanagement.event.destroy',
        'uses' => 'EventController@destroy',
        'middleware' => 'can:productmanagement.events.destroy'
    ]);
    $router->bind('flavour', function ($id) {
        return app('Modules\ProductManagement\Repositories\FlavourRepository')->find($id);
    });
    $router->get('flavours', [
        'as' => 'admin.productmanagement.flavour.index',
        'uses' => 'FlavourController@index',
        'middleware' => 'can:productmanagement.flavours.index'
    ]);
    $router->get('flavours/create', [
        'as' => 'admin.productmanagement.flavour.create',
        'uses' => 'FlavourController@create',
        'middleware' => 'can:productmanagement.flavours.create'
    ]);
    $router->post('flavours', [
        'as' => 'admin.productmanagement.flavour.store',
        'uses' => 'FlavourController@store',
        'middleware' => 'can:productmanagement.flavours.create'
    ]);
    $router->get('flavours/{flavour}/edit', [
        'as' => 'admin.productmanagement.flavour.edit',
        'uses' => 'FlavourController@edit',
        'middleware' => 'can:productmanagement.flavours.edit'
    ]);
    $router->put('flavours/{flavour}', [
        'as' => 'admin.productmanagement.flavour.update',
        'uses' => 'FlavourController@update',
        'middleware' => 'can:productmanagement.flavours.edit'
    ]);
    $router->delete('flavours/{flavour}', [
        'as' => 'admin.productmanagement.flavour.destroy',
        'uses' => 'FlavourController@destroy',
        'middleware' => 'can:productmanagement.flavours.destroy'
    ]);
    $router->bind('shape', function ($id) {
        return app('Modules\ProductManagement\Repositories\ShapeRepository')->find($id);
    });
    $router->get('shapes', [
        'as' => 'admin.productmanagement.shape.index',
        'uses' => 'ShapeController@index',
        'middleware' => 'can:productmanagement.shapes.index'
    ]);
    $router->get('shapes/create', [
        'as' => 'admin.productmanagement.shape.create',
        'uses' => 'ShapeController@create',
        'middleware' => 'can:productmanagement.shapes.create'
    ]);
    $router->post('shapes', [
        'as' => 'admin.productmanagement.shape.store',
        'uses' => 'ShapeController@store',
        'middleware' => 'can:productmanagement.shapes.create'
    ]);
    $router->get('shapes/{shape}/edit', [
        'as' => 'admin.productmanagement.shape.edit',
        'uses' => 'ShapeController@edit',
        'middleware' => 'can:productmanagement.shapes.edit'
    ]);
    $router->put('shapes/{shape}', [
        'as' => 'admin.productmanagement.shape.update',
        'uses' => 'ShapeController@update',
        'middleware' => 'can:productmanagement.shapes.edit'
    ]);
    $router->delete('shapes/{shape}', [
        'as' => 'admin.productmanagement.shape.destroy',
        'uses' => 'ShapeController@destroy',
        'middleware' => 'can:productmanagement.shapes.destroy'
    ]);
    $router->bind('design', function ($id) {
        return app('Modules\ProductManagement\Repositories\DesignRepository')->find($id);
    });
    $router->get('designs', [
        'as' => 'admin.productmanagement.design.index',
        'uses' => 'DesignController@index',
        'middleware' => 'can:productmanagement.designs.index'
    ]);
    $router->get('designs/create', [
        'as' => 'admin.productmanagement.design.create',
        'uses' => 'DesignController@create',
        'middleware' => 'can:productmanagement.designs.create'
    ]);
    $router->post('designs', [
        'as' => 'admin.productmanagement.design.store',
        'uses' => 'DesignController@store',
        'middleware' => 'can:productmanagement.designs.create'
    ]);
    $router->get('designs/{design}/edit', [
        'as' => 'admin.productmanagement.design.edit',
        'uses' => 'DesignController@edit',
        'middleware' => 'can:productmanagement.designs.edit'
    ]);
    $router->put('designs/{design}', [
        'as' => 'admin.productmanagement.design.update',
        'uses' => 'DesignController@update',
        'middleware' => 'can:productmanagement.designs.edit'
    ]);
    $router->delete('designs/{design}', [
        'as' => 'admin.productmanagement.design.destroy',
        'uses' => 'DesignController@destroy',
        'middleware' => 'can:productmanagement.designs.destroy'
    ]);
    $router->bind('icing', function ($id) {
        return app('Modules\ProductManagement\Repositories\IcingRepository')->find($id);
    });
    $router->get('icings', [
        'as' => 'admin.productmanagement.icing.index',
        'uses' => 'IcingController@index',
        'middleware' => 'can:productmanagement.icings.index'
    ]);
    $router->get('icings/create', [
        'as' => 'admin.productmanagement.icing.create',
        'uses' => 'IcingController@create',
        'middleware' => 'can:productmanagement.icings.create'
    ]);
    $router->post('icings', [
        'as' => 'admin.productmanagement.icing.store',
        'uses' => 'IcingController@store',
        'middleware' => 'can:productmanagement.icings.create'
    ]);
    $router->get('icings/{icing}/edit', [
        'as' => 'admin.productmanagement.icing.edit',
        'uses' => 'IcingController@edit',
        'middleware' => 'can:productmanagement.icings.edit'
    ]);
    $router->put('icings/{icing}', [
        'as' => 'admin.productmanagement.icing.update',
        'uses' => 'IcingController@update',
        'middleware' => 'can:productmanagement.icings.edit'
    ]);
    $router->delete('icings/{icing}', [
        'as' => 'admin.productmanagement.icing.destroy',
        'uses' => 'IcingController@destroy',
        'middleware' => 'can:productmanagement.icings.destroy'
    ]);
    $router->bind('subcategory', function ($id) {
        return app('Modules\ProductManagement\Repositories\SubcategoryRepository')->find($id);
    });
    $router->get('subcategories', [
        'as' => 'admin.productmanagement.subcategory.index',
        'uses' => 'SubcategoryController@index',
        'middleware' => 'can:productmanagement.subcategories.index'
    ]);
    $router->get('subcategories/create', [
        'as' => 'admin.productmanagement.subcategory.create',
        'uses' => 'SubcategoryController@create',
        'middleware' => 'can:productmanagement.subcategories.create'
    ]);
    $router->post('subcategories', [
        'as' => 'admin.productmanagement.subcategory.store',
        'uses' => 'SubcategoryController@store',
        'middleware' => 'can:productmanagement.subcategories.create'
    ]);
    $router->get('subcategories/{subcategory}/edit', [
        'as' => 'admin.productmanagement.subcategory.edit',
        'uses' => 'SubcategoryController@edit',
        'middleware' => 'can:productmanagement.subcategories.edit'
    ]);
    $router->put('subcategories/{subcategory}', [
        'as' => 'admin.productmanagement.subcategory.update',
        'uses' => 'SubcategoryController@update',
        'middleware' => 'can:productmanagement.subcategories.edit'
    ]);
    $router->delete('subcategories/{subcategory}', [
        'as' => 'admin.productmanagement.subcategory.destroy',
        'uses' => 'SubcategoryController@destroy',
        'middleware' => 'can:productmanagement.subcategories.destroy'
    ]);
    $router->bind('color', function ($id) {
        return app('Modules\ProductManagement\Repositories\ColorRepository')->find($id);
    });
    $router->get('colors', [
        'as' => 'admin.productmanagement.color.index',
        'uses' => 'ColorController@index',
        'middleware' => 'can:productmanagement.colors.index'
    ]);
    $router->get('colors/create', [
        'as' => 'admin.productmanagement.color.create',
        'uses' => 'ColorController@create',
        'middleware' => 'can:productmanagement.colors.create'
    ]);
    $router->post('colors', [
        'as' => 'admin.productmanagement.color.store',
        'uses' => 'ColorController@store',
        'middleware' => 'can:productmanagement.colors.create'
    ]);
    $router->get('colors/{color}/edit', [
        'as' => 'admin.productmanagement.color.edit',
        'uses' => 'ColorController@edit',
        'middleware' => 'can:productmanagement.colors.edit'
    ]);
    $router->put('colors/{color}', [
        'as' => 'admin.productmanagement.color.update',
        'uses' => 'ColorController@update',
        'middleware' => 'can:productmanagement.colors.edit'
    ]);
    $router->delete('colors/{color}', [
        'as' => 'admin.productmanagement.color.destroy',
        'uses' => 'ColorController@destroy',
        'middleware' => 'can:productmanagement.colors.destroy'
    ]);
// append









});
