<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::domain('{subdomain}.wtsp.today')->group(function ($router) {
//     Route::get('/', 'SubdomainsController@index');
// });

Route::group(['domain' => '{subdomain}.'. config('app.short_url')], function()
{
    Route::get('/', 'SubdomainsController@index');
});

// Match my own domain
Route::group(['domain' => config('app.short_url')], function()
{ 
    Route::get('/', 'PagesController@index');

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/link/create', 'LinksController@create')->name('user.link.create');
    Route::get('/link/store', 'LinksController@store')->name('user.link.store');
    Route::get('/link/edit/{id}', 'LinksController@edit')->name('user.link.edit');
    Route::get('/link/update/{id}', 'LinksController@update')->name('user.link.update');
}); 