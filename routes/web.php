<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('user', 'UserController@index')->name('user');
Route::get('signup_su', 'UserController@signup_su')->name('signup_su');
Route::post('store_su', 'UserController@store')->name('store_su');
Route::get('signup', 'UserController@signup')->name('signup');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'author'], function()
	{
		Route::get('', ['uses'=>'AuthorController@index'])->name('author');
		Route::get('create', ['uses'=>'AuthorController@create']);
		Route::post('store', ['uses'=>'AuthorController@store'])->name('author/store');
		Route::get('{id}/show', ['uses'=>'AuthorController@show']);
		Route::get('{id}/edit', ['uses'=>'AuthorController@edit']);
		Route::put('{id}/update', ['uses'=>'AuthorController@update']);
		Route::delete('{id}/destroy', ['uses'=>'AuthorController@destroy']);
	});

Route::group(['prefix'=>'book'], function()
	{
		Route::get('', ['uses'=>'BookController@index']);
		Route::get('create', ['uses'=>'BookController@create']);
		Route::post('store', ['uses'=>'BookController@store']);
		Route::get('{id}/show', ['uses'=>'BookController@show']);
		Route::get('{id}/edit', ['uses'=>'BookController@edit']);
		Route::put('{id}/update', ['uses'=>'BookController@update']);
		Route::delete('{id}/destroy', ['uses'=>'BookController@destroy']);
	});


Route::group(['prefix'=>'location'], function()
	{
		Route::get('', ['uses'=>'LocationController@index'])->name('location');
		Route::get('create', ['uses'=>'LocationController@create']);
		Route::post('store', ['uses'=>'LocationController@store'])->name('location/store');
		Route::get('{id}/show', ['uses'=>'LocationController@show']);
		Route::get('{id}/edit', ['uses'=>'LocationController@edit']);
		Route::put('{id}/update', ['uses'=>'LocationController@update']);
		Route::delete('{id}/destroy', ['uses'=>'LocationController@destroy']);
	});

Route::group(['prefix'=>'copy'], function()
	{
		Route::get('', ['uses'=>'CopyController@index']);
		Route::get('create', ['uses'=>'CopyController@create']);
		Route::post('store', ['uses'=>'CopyController@store']);
		Route::get('{id}/show', ['uses'=>'CopyController@show']);
		Route::get('{id}/edit', ['uses'=>'CopyController@edit']);
		Route::put('{id}/update', ['uses'=>'CopyController@update']);
		Route::delete('{id}/destroy', ['uses'=>'CopyController@destroy']);
	});

Route::group(['prefix'=>'knowledge_area'], function()
	{
		Route::get('', ['uses'=>'Knowledge_areaController@index'])->name('knowledge_area');
		Route::get('create', ['uses'=>'Knowledge_areaController@create']);
		Route::post('store', ['uses'=>'Knowledge_areaController@store'])->name('knowledge_area/store');
		Route::get('{id}/show', ['uses'=>'Knowledge_areaController@show']);
		Route::get('{id}/edit', ['uses'=>'Knowledge_areaController@edit']);
		Route::put('{id}/update', ['uses'=>'Knowledge_areaController@update']);
		Route::delete('{id}/destroy', ['uses'=>'Knowledge_areaController@destroy']);
	});

Route::group(['prefix'=>'publisher'], function()
	{
		Route::get('', ['uses'=>'PublisherController@index'])->name('publisher');
		Route::get('create', ['uses'=>'PublisherController@create']);
		Route::post('store', ['uses'=>'PublisherController@store'])->name('publisher/store');
		Route::get('{id}/show', ['uses'=>'PublisherController@show']);
		Route::get('{id}/edit', ['uses'=>'PublisherController@edit']);
		Route::put('{id}/update', ['uses'=>'PublisherController@update']);
		Route::delete('{id}/destroy', ['uses'=>'PublisherController@destroy']);
	});

Route::group(['prefix'=>'subject'], function()
	{
		Route::get('', ['uses'=>'SubjectController@index'])->name('subject');
		Route::get('create', ['uses'=>'SubjectController@create']);
		Route::post('store', ['uses'=>'SubjectController@store'])->name('subject/store');
		Route::get('{id}/show', ['uses'=>'SubjectController@show']);
		Route::get('{id}/edit', ['uses'=>'SubjectController@edit']);
		Route::put('{id}/update', ['uses'=>'SubjectController@update']);
		Route::delete('{id}/destroy', ['uses'=>'SubjectController@destroy']);
	});