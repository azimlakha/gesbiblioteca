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

Route::get('/', 'HomeController@index');


Auth::routes();

Route::get('user', 'UserController@index')->name('user')->middleware('auth', 'admin');
Route::get('signup_su', 'UserController@signup_su')->name('signup_su')->middleware('auth', 'admin');
Route::post('store_su', 'UserController@store')->name('store_su')->middleware('auth', 'admin');
Route::get('signup', 'UserController@signup')->name('signup')->middleware('auth', 'admin');
Route::get('{id}/edituser', 'UserController@edituser')->name('edituser')->middleware('auth', 'admin');
Route::put('{id}/user', 'UserController@updateuser')->name('user.update')->middleware('auth', 'admin');
Route::get('editprofile', 'UserController@edit')->name('editprofile')->middleware('auth');
Route::put('{id}/profile', 'UserController@update')->name('user.profile')->middleware('auth');


Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('adminbookings', 'AdminController@bookings')->middleware('auth', 'admin')->name('adminbookings');
Route::post('adminbookings_search', 'BookingController@search')->middleware('auth', 'admin')->name('adminbookings_search');

Route::get('errors/permition', 'ErrorsController@index')->name('errors/permition');

Route::get('asset/create', 'LocationAssetsController@create')->middleware('auth', 'admin')->name('asset/create');
Route::post('asset/store', 'LocationAssetsController@store')->name('asset/store')->middleware('auth', 'admin');

Route::get('/homepage', 'HomeController@index')->name('homepage');
Route::post('/home/search', 'HomeController@search')->name('home/search');

Route::group(['prefix'=>'booking', 'middleware' => ['auth']], function()
	{
		Route::get('', ['uses'=>'BookingController@index'])->name('booking');
		Route::get('{id}/create', ['uses'=>'BookingController@create'])->name('booking/create');
		Route::post('store', ['uses'=>'BookingController@store'])->name('booking/store');
		Route::get('{id}/show', ['uses'=>'BookingController@show'])->name('booking.show');
		Route::get('{id}/edit', ['uses'=>'BookingController@edit'])->name('booking.edit');
		Route::put('{id}/update', ['uses'=>'BookingController@update'])->name('booking.update');
		Route::delete('{id}/destroy', ['uses'=>'BookingController@destroy'])->name('booking.destroy');
	});

Route::group(['prefix'=>'wishlist', 'middleware' => ['auth']], function()
	{
		Route::get('', ['uses'=>'WishlistController@index'])->name('wishlist');
		Route::get('{id}/create', ['uses'=>'WishlistController@create'])->name('wishlist/create');
		Route::post('store', ['uses'=>'WishlistController@store'])->name('wishlist/store');
		Route::get('{id}/show', ['uses'=>'WishlistController@show'])->name('wishlist.show');
		Route::get('{id}/edit', ['uses'=>'WishlistController@edit'])->name('wishlist.edit');
		Route::put('{id}/update', ['uses'=>'WishlistController@update'])->name('wishlist.update');
		Route::delete('{id}/destroy', ['uses'=>'WishlistController@destroy'])->name('wishlist.destroy');
	});

Route::group(['prefix'=>'section', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'SectionController@index'])->name('section');
		Route::get('{id}/show', ['uses'=>'SectionController@show'])->name('section.show');
		Route::get('{id}/edit', ['uses'=>'SectionController@edit'])->name('section.edit');
		Route::put('{id}/update', ['uses'=>'SectionController@update'])->name('section.update');
		Route::delete('{id}/destroy', ['uses'=>'SectionController@destroy'])->name('section.destroy');
	});

Route::group(['prefix'=>'bookcase', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'BookcaseController@index'])->name('bookcase');
		Route::get('{id}/show', ['uses'=>'BookcaseController@show'])->name('bookcase.show');
		Route::get('{id}/edit', ['uses'=>'BookcaseController@edit'])->name('bookcase.edit');
		Route::put('{id}/update', ['uses'=>'BookcaseController@update'])->name('bookcase.update');
		Route::delete('{id}/destroy', ['uses'=>'BookcaseController@destroy'])->name('bookcase.destroy');
	});

Route::group(['prefix'=>'shelf', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'ShelfController@index'])->name('shelf');
		Route::get('{id}/show', ['uses'=>'ShelfController@show'])->name('shelf.show');
		Route::get('{id}/edit', ['uses'=>'ShelfController@edit'])->name('shelf.edit');
		Route::put('{id}/update', ['uses'=>'ShelfController@update'])->name('shelf.update');
		Route::delete('{id}/destroy', ['uses'=>'ShelfController@destroy'])->name('shelf.destroy');
	});

Route::group(['prefix'=>'author', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'AuthorController@index'])->name('author');
		Route::get('create', ['uses'=>'AuthorController@create']);
		Route::post('store', ['uses'=>'AuthorController@store'])->name('author/store');
		Route::get('{id}/show', ['uses'=>'AuthorController@show'])->name('author.show');
		Route::get('{id}/edit', ['uses'=>'AuthorController@edit'])->name('author.edit');
		Route::put('{id}/update', ['uses'=>'AuthorController@update'])->name('author.update');
		Route::delete('{id}/destroy', ['uses'=>'AuthorController@destroy'])->name('author.destroy');
	});

Route::group(['prefix' => 'book', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'BookController@index'])->name('book');
		Route::get('create', ['uses'=>'BookController@create']);
		Route::post('store', ['uses'=>'BookController@store'])->name('book/store');
		Route::get('{id}/show', ['uses'=>'BookController@show'])->name('book.show');
		Route::get('{id}/edit', ['uses'=>'BookController@edit'])->name('book.edit');
		Route::put('{id}/update', ['uses'=>'BookController@update'])->name('book.update');
		Route::delete('{id}/destroy', ['uses'=>'BookController@destroy'])->name('book.destroy');
	});


Route::group(['prefix'=>'location', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'LocationController@index'])->name('location');
		Route::get('create', ['uses'=>'LocationController@create']);
		Route::post('store', ['uses'=>'LocationController@store'])->name('location/store');
		Route::get('{id}/show', ['uses'=>'LocationController@show'])->name('location.show');
		Route::get('{id}/edit', ['uses'=>'LocationController@edit'])->name('location.edit');
		Route::put('{id}/update', ['uses'=>'LocationController@update'])->name('location.update');
		Route::delete('{id}/destroy', ['uses'=>'LocationController@destroy'])->name('location.destroy');
	});

Route::group(['prefix'=>'copy', 'middleware' => ['auth','admin']], function()
	{
		Route::get('{id}', ['uses'=>'CopyController@index'])->name('copy');
		Route::get('{id}/create', ['uses'=>'CopyController@create'])->name('copy.create');
		Route::post('store', ['uses'=>'CopyController@store'])->name('copy/store');
		Route::get('{id}/show', ['uses'=>'CopyController@show'])->name('copy.show');
		Route::get('{id}/edit', ['uses'=>'CopyController@edit'])->name('copy.edit');
		Route::put('{id}/update', ['uses'=>'CopyController@update'])->name('copy.update');
		Route::delete('{id}/destroy', ['uses'=>'CopyController@destroy'])->name('copy.destroy');
	});

Route::group(['prefix'=>'knowledge_area', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'Knowledge_areaController@index'])->name('knowledge_area');
		Route::get('create', ['uses'=>'Knowledge_areaController@create']);
		Route::post('store', ['uses'=>'Knowledge_areaController@store'])->name('knowledge_area/store');
		Route::get('{id}/show', ['uses'=>'Knowledge_areaController@show'])->name('knowledge_area.show');
		Route::get('{id}/edit', ['uses'=>'Knowledge_areaController@edit'])->name('knowledge_area.edit');
		Route::put('{id}/update', ['uses'=>'Knowledge_areaController@update'])->name('knowledge_area.update');
		Route::delete('{id}/destroy', ['uses'=>'Knowledge_areaController@destroy'])->name('knowledge_area.destroy');
	});

Route::group(['prefix'=>'publisher', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'PublisherController@index'])->name('publisher');
		Route::get('create', ['uses'=>'PublisherController@create']);
		Route::post('store', ['uses'=>'PublisherController@store'])->name('publisher/store');
		Route::get('{id}/show', ['uses'=>'PublisherController@show'])->name('publisher.show');
		Route::get('{id}/edit', ['uses'=>'PublisherController@edit'])->name('publisher.edit');
		Route::put('{id}/update', ['uses'=>'PublisherController@update'])->name('publisher.update');
		Route::delete('{id}/destroy', ['uses'=>'PublisherController@destroy'])->name('publisher.destroy');
	});

Route::group(['prefix'=>'subject', 'middleware' => ['auth','admin']], function()
	{
		Route::get('', ['uses'=>'SubjectController@index'])->name('subject');
		Route::get('create', ['uses'=>'SubjectController@create']);
		Route::post('store', ['uses'=>'SubjectController@store'])->name('subject/store');
		Route::get('{id}/show', ['uses'=>'SubjectController@show'])->name('subject.show');
		Route::get('{id}/edit', ['uses'=>'SubjectController@edit'])->name('subject.edit');
		Route::put('{id}/update', ['uses'=>'SubjectController@update'])->name('subject.update');
		Route::delete('{id}/destroy', ['uses'=>'SubjectController@destroy'])->name('subject.destroy');
	});