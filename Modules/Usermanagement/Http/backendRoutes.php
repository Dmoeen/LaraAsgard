<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/usermanagement'], function (Router $router) {
    $router->bind('category', function ($id) {
        return app('Modules\Usermanagement\Repositories\CategoryRepository')->find($id);
    });
    $router->get('categories', [
        'as' => 'admin.usermanagement.category.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:usermanagement.categories.index'
    ]);
    $router->get('categories/create', [
        'as' => 'admin.usermanagement.category.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:usermanagement.categories.create'
    ]);
    $router->post('categories', [
        'as' => 'admin.usermanagement.category.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:usermanagement.categories.create'
    ]);
    $router->get('categories/{category}/edit', [
        'as' => 'admin.usermanagement.category.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:usermanagement.categories.edit'
    ]);
    $router->put('categories/{category}', [
        'as' => 'admin.usermanagement.category.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:usermanagement.categories.edit'
    ]);
    $router->delete('categories/{category}', [
        'as' => 'admin.usermanagement.category.destroy',
        'uses' => 'CategoryController@destroy',
        'middleware' => 'can:usermanagement.categories.destroy'
    ]);

    $router->bind('company', function ($id) {
        return app('Modules\User\Repositories\UserRepository')->find($id);
    });
    $router->get('companies', [
        'as' => 'admin.usermanagement.company.index',
        'uses' => 'CompanyController@index',
        'middleware' => 'can:usermanagement.companies.index'
    ]);
    $router->get('companies/create', [
        'as' => 'admin.usermanagement.company.create',
        'uses' => 'CompanyController@create',
        'middleware' => 'can:usermanagement.companies.create'
    ]);
    $router->post('companies', [
        'as' => 'admin.usermanagement.company.store',
        'uses' => 'CompanyController@store',
        'middleware' => 'can:usermanagement.companies.create'
    ]);
    $router->get('companies/{company}/edit', [
        'as' => 'admin.usermanagement.company.edit',
        'uses' => 'CompanyController@edit',
        'middleware' => 'can:usermanagement.companies.edit'
    ]);
    $router->put('companies/{company}', [
        'as' => 'admin.usermanagement.company.update',
        'uses' => 'CompanyController@update',
        'middleware' => 'can:usermanagement.companies.edit'
    ]);
    $router->delete('companies/{company}', [
        'as' => 'admin.usermanagement.company.destroy',
        'uses' => 'CompanyController@destroy',
        'middleware' => 'can:usermanagement.companies.destroy'
    ]);
// append

});
