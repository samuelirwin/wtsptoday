<?php

Route::domain(config('app.short_url'))->group(function () 
{


    //Route::redirect('/', '/login');
    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('search', 'HomeController@search')->name('search');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function ()
    {
        Route::get('/', 'HomeController@index')->name('home');
        // Permissions
        Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
        Route::resource('permissions', 'PermissionsController');

        // Roles
        Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
        Route::resource('roles', 'RolesController');

        // Users
        Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
        Route::resource('users', 'UsersController');

        // Products
        Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');
        Route::post('products/media', 'ProductsController@storeMedia')->name('products.storeMedia');
        Route::resource('products', 'ProductsController');

        // Links
        Route::delete('links/destroy', 'LinksController@massDestroy')->name('links.massDestroy');
        Route::resource('links', 'LinksController');
    });
});

Route::domain('{subdomain}.'.config('app.short_url'))->group(function () 
{
    Route::get('/', 'SubdomainsController@index');
    // Route::get('/', 'ProductsController@index')->name('products.index');
    // Route::resource('products', 'ProductsController')->only(['index', 'show']);
});

Route::get('/{slug}', 'SlugController@index');