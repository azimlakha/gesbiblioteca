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

Route::get('asset/create', 'LocationAssetsController@create');
Route::post('asset/store', 'LocationAssetsController@store')->name('asset/store');

Route::get('/homepage', 'BookingController@index')->name('homepage');
Route::get('booking/{id}/create', 'BookingController@create')->name('booking.create');
Route::post('booking/store', 'BookingController@store')->name('booking/store');

Route::group(['prefix'=>'section'], function()
	{
		Route::get('', ['uses'=>'SectionController@index'])->name('section');
		Route::get('{id}/show', ['uses'=>'SectionController@show'])->name('section.show');
		Route::get('{id}/edit', ['uses'=>'SectionController@edit'])->name('section.edit');
		Route::put('{id}/update', ['uses'=>'SectionController@update'])->name('section.update');
		Route::delete('{id}/destroy', ['uses'=>'SectionController@destroy'])->name('section.destroy');
	});

Route::group(['prefix'=>'bookcase'], function()
	{
		Route::get('', ['uses'=>'BookcaseController@index'])->name('bookcase');
		Route::get('{id}/show', ['uses'=>'BookcaseController@show'])->name('bookcase.show');
		Route::get('{id}/edit', ['uses'=>'BookcaseController@edit'])->name('bookcase.edit');
		Route::put('{id}/update', ['uses'=>'BookcaseController@update'])->name('bookcase.update');
		Route::delete('{id}/destroy', ['uses'=>'BookcaseController@destroy'])->name('bookcase.destroy');
	});

Route::group(['prefix'=>'shelf'], function()
	{
		Route::get('', ['uses'=>'ShelfController@index'])->name('shelf');
		Route::get('{id}/show', ['uses'=>'ShelfController@show'])->name('shelf.show');
		Route::get('{id}/edit', ['uses'=>'ShelfController@edit'])->name('shelf.edit');
		Route::put('{id}/update', ['uses'=>'ShelfController@update'])->name('shelf.update');
		Route::delete('{id}/destroy', ['uses'=>'ShelfController@destroy'])->name('shelf.destroy');
	});

Route::group(['prefix'=>'author'], function()
	{
		Route::get('', ['uses'=>'AuthorController@index'])->name('author');
		Route::get('create', ['uses'=>'AuthorController@create']);
		Route::post('store', ['uses'=>'AuthorController@store'])->name('author/store');
		Route::get('{id}/show', ['uses'=>'AuthorController@show'])->name('author.show');
		Route::get('{id}/edit', ['uses'=>'AuthorController@edit'])->name('author.edit');
		Route::put('{id}/update', ['uses'=>'AuthorController@update'])->name('author.update');
		Route::delete('{id}/destroy', ['uses'=>'AuthorController@destroy'])->name('author.destroy');
	});

Route::group(['prefix'=>'book'], function()
	{
		Route::get('', ['uses'=>'BookController@index'])->name('book');
		Route::get('create', ['uses'=>'BookController@create']);
		Route::post('store', ['uses'=>'BookController@store'])->name('book/store');
		Route::get('{id}/show', ['uses'=>'BookController@show'])->name('book.show');
		Route::get('{id}/edit', ['uses'=>'BookController@edit'])->name('book.edit');
		Route::put('{id}/update', ['uses'=>'BookController@update'])->name('book.update');
		Route::delete('{id}/destroy', ['uses'=>'BookController@destroy'])->name('book.destroy');
	});


Route::group(['prefix'=>'location'], function()
	{
		Route::get('', ['uses'=>'LocationController@index'])->name('location');
		Route::get('create', ['uses'=>'LocationController@create']);
		Route::post('store', ['uses'=>'LocationController@store'])->name('location/store');
		Route::get('{id}/show', ['uses'=>'LocationController@show'])->name('location.show');
		Route::get('{id}/edit', ['uses'=>'LocationController@edit'])->name('location.edit');
		Route::put('{id}/update', ['uses'=>'LocationController@update'])->name('location.update');
		Route::delete('{id}/destroy', ['uses'=>'LocationController@destroy'])->name('location.destroy');
	});

Route::group(['prefix'=>'copy'], function()
	{
		Route::get('', ['uses'=>'CopyController@index'])->name('copy');
		Route::get('create', ['uses'=>'CopyController@create']);
		Route::post('store', ['uses'=>'CopyController@store'])->name('copy/store');
		Route::get('{id}/show', ['uses'=>'CopyController@show'])->name('copy.show');
		Route::get('{id}/edit', ['uses'=>'CopyController@edit'])->name('copy.edit');
		Route::put('{id}/update', ['uses'=>'CopyController@update'])->name('copy.update');
		Route::delete('{id}/destroy', ['uses'=>'CopyController@destroy'])->name('copy.destroy');
	});

Route::group(['prefix'=>'knowledge_area'], function()
	{
		Route::get('', ['uses'=>'Knowledge_areaController@index'])->name('knowledge_area');
		Route::get('create', ['uses'=>'Knowledge_areaController@create']);
		Route::post('store', ['uses'=>'Knowledge_areaController@store'])->name('knowledge_area/store');
		Route::get('{id}/show', ['uses'=>'Knowledge_areaController@show'])->name('knowledge_area.show');
		Route::get('{id}/edit', ['uses'=>'Knowledge_areaController@edit'])->name('knowledge_area.edit');
		Route::put('{id}/update', ['uses'=>'Knowledge_areaController@update'])->name('knowledge_area.update');
		Route::delete('{id}/destroy', ['uses'=>'Knowledge_areaController@destroy'])->name('knowledge_area.destroy');
	});

Route::group(['prefix'=>'publisher'], function()
	{
		Route::get('', ['uses'=>'PublisherController@index'])->name('publisher');
		Route::get('create', ['uses'=>'PublisherController@create']);
		Route::post('store', ['uses'=>'PublisherController@store'])->name('publisher/store');
		Route::get('{id}/show', ['uses'=>'PublisherController@show'])->name('publisher.show');
		Route::get('{id}/edit', ['uses'=>'PublisherController@edit'])->name('publisher.edit');
		Route::put('{id}/update', ['uses'=>'PublisherController@update'])->name('publisher.update');
		Route::delete('{id}/destroy', ['uses'=>'PublisherController@destroy'])->name('publisher.destroy');
	});

Route::group(['prefix'=>'subject'], function()
	{
		Route::get('', ['uses'=>'SubjectController@index'])->name('subject');
		Route::get('create', ['uses'=>'SubjectController@create']);
		Route::post('store', ['uses'=>'SubjectController@store'])->name('subject/store');
		Route::get('{id}/show', ['uses'=>'SubjectController@show'])->name('subject.show');
		Route::get('{id}/edit', ['uses'=>'SubjectController@edit'])->name('subject.edit');
		Route::put('{id}/update', ['uses'=>'SubjectController@update'])->name('subject.update');
		Route::delete('{id}/destroy', ['uses'=>'SubjectController@destroy'])->name('subject.destroy');
	});