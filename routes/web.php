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

Route::get('/', 'RssFeedController@showCategory');


Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function() {
	Route::get('/home', 'RssFeedController@index')->name('home');
	Route::post('/add-category', 'RssFeedController@addCategory')->name('addcategory');
	Route::get('/category', 'RssFeedController@addCategoryForm')->name('category');
	Route::delete('/category/{category}', 'RssFeedController@destroy')->name('category.delete');
	Route::get('/add-rss/{category}', 'RssFeedController@addRssFeedForm')->name('rssfeedform');
	Route::post('/add-rss/{category}', 'RssFeedController@addRssFeed')->name('addrssfeed');
	Route::delete('/delete-rss/{category}/{feed}', 'RssFeedController@destroyRssFeed')->name('feed.delete');
});

Route::get('/single-category/{category}', 'RssFeedController@singleCategory')->name('singlecategory');
