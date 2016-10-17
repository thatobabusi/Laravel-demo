<?php

use App\Role;

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::auth();

    //Pages that need authentication
    Route::get('/home', 'HomeController@index');

    //pages that dont need authentication
    Route::get('pages/about', 'PagesController@about');

    Route::group(['middleware' => ['auth']], function () {
        Route::get('/users/{users}/user-settings', [
            'as' => 'editUserSettings', 'uses' => 'UserController@editSettings'
        ]);
        Route::get('/users/{users}/password', [
            'as' => 'editPassword_path', 'uses' => 'UserController@editPassword'
        ]);
        Route::patch('/users/{users}/password', [
            'as' => 'updatePassword_path', 'uses' => 'UserController@updatePassword'
        ]);
        Route::get('/users/{users}/edit/delete', [
            'as' => 'deleteUser_path', 'uses' => 'UserController@destroy'
        ]);

        Route::post('/users/store', 'UserController@store');
        Route::post('/users/storeAddress', 'UserController@storeAddress');
        Route::post('/users/storeAddress', [
            'as' => 'storeAddress', 'uses' => 'UserController@storeAddress'
        ]);
        Route::post('/users/storeCompany', [
            'as' => 'storeCompany', 'uses' => 'UserController@storeCompany'
        ]);

        //Route for the AJAX call
        Route::get('users/search/autocomplete', 'APIController@autocomplete');

        Route::post('/users/updatePermissions', [
            'as' => 'updatePermissions', 'uses' => 'UserController@updatePermissions'
        ]);
        Route::patch('/users/{users}/edit/editPermissions', [
            'as' => 'editPermissions', 'uses' => 'UserController@editPermissions'
        ]);
        Route::patch('/users/{users}/edit', [
            'as' => 'editCompany_path', 'uses' => 'UserController@editCompany'
        ]);
    });

    Route::resource('users', 'UserController', [
        'names' => [
            'index' => 'users_path',
            'show' => 'showUsers_path',
            'create' => 'createUser_path',
            'edit' => 'editUser_path',
            'update' => 'updateUser_path',
            'destroy' => 'destroyUser_path',
            'store' => 'storeUser_path'
        ]
    ]);

    Route::resource('songs', 'SongsController', [
        'names' => [
            'index' => 'index_path',
            'show' => 'show_path',
            'create' => 'create_path',
            'edit' => 'edit_path',
            'update' => 'update_path',
            'destroy' => 'destroy_path',
            'store' => 'store_path'
        ]
    ]);
});
