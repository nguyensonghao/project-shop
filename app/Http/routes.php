<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth Controller
Route::get('login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@show_login']);
Route::post('login', ['as' => 'admin.login', 'uses' => 'Admin\AuthController@action_login']);
Route::get('logout', ['as' => 'admin.logout', 'uses' => 'Admin\AuthController@action_logout']);

Route::group(['prefix' => 'admin'], function () {        

	// Product Controller
	Route::get('product/list', ['as' => 'admin.product.list', 'uses' => 'Admin\ProductController@show_list']);
    Route::get('product/add', ['as' => 'admin.product.add', 'uses' => 'Admin\ProductController@show_add']);
    Route::get('product/view/{id}', ['as' => 'admin.product.view', 'uses' => 'Admin\ProductController@show_detail']);

    // Label Controller
    Route::get('label/list', ['as' => 'admin.label.list', 'uses' => 'Admin\LabelController@show_list']);
    Route::get('label/add', ['as' => 'admin.label.add', 'uses' => 'Admin\LabelController@show_add']);
    Route::get('label/view/{id}', ['as' => 'admin.label.view', 'uses' => 'Admin\LabelController@show_detail']);
    Route::post('label/add', ['as' => 'admin.label.add', 'uses' => 'Admin\LabelController@action_add']);
    Route::post('label/delete', ['as' => 'admin.label.delete', 'uses' => 'Admin\LabelController@action_delete']);
    Route::post('label/update', ['as' => 'admin.label.update', 'uses' => 'Admin\LabelController@action_update']);
    Route::post('label/active', ['as' => 'admin.label.active', 'uses' => 'Admin\LabelController@action_active']);

    // Category Controller
    Route::get('category/list', ['as' => 'admin.category.list', 'uses' => 'Admin\CategoryController@show_list']);
    Route::get('category/add', ['as' => 'admin.category.add', 'uses' => 'Admin\CategoryController@show_add']);
    Route::get('category/view/{id}', ['as' => 'admin.category.view', 'uses' => 'Admin\CategoryController@show_detail']);
    Route::post('category/add', ['as' => 'admin.category.add', 'uses' => 'Admin\CategoryController@action_add']);
    Route::post('category/delete', ['as' => 'admin.category.delete', 'uses' => 'Admin\CategoryController@action_delete']);
    Route::post('category/update', ['as' => 'admin.category.update', 'uses' => 'Admin\CategoryController@action_update']);
    Route::post('category/active', ['as' => 'admin.category.active', 'uses' => 'Admin\CategoryController@action_active']);

    // Article Controller
    Route::get('article/add', ['as' => 'admin.article.add', 'uses' => 'Admin\ArticleController@show_add']);
    Route::post('article/add', ['as' => 'admin.article.add', 'uses' => 'Admin\ArticleController@action_add']);
});

// Route::auth();

Route::get('/home', 'HomeController@index');
