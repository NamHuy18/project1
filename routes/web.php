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

Route::group(['prefix' => 'admin', 'middleware' => 'login' ], function()
{	
	Route::get('/', 'DashboardController@getHome')->name('dashboard');
    Route::group(['prefix' => 'category'], function()
	{
	    Route::get('list', 'CategoryController@getList')->name('listCat');
	    Route::get('add', 'CategoryController@getAdd')->name('addCat');
	    Route::post('add', 'CategoryController@postAdd');
	    Route::get('edit/{id}', 'CategoryController@getEdit')->name('editCat');
	    Route::post('edit/{id}', 'CategoryController@postEdit');
	    Route::get('delete/{id}', 'CategoryController@getDelete')->name('deleteCat');
	});
	Route::group(['prefix' => 'promotion'], function()
	{
	    Route::get('list', 'PromotionController@getList')->name('listSale');
	    Route::get('add', 'PromotionController@getAdd')->name('addSale');
	    Route::post('add', 'PromotionController@postAdd');
	    Route::get('edit/{id}', 'PromotionController@getEdit')->name('editSale');
	    Route::post('edit/{id}', 'PromotionController@postEdit');
	    Route::get('delete/{id}', 'PromotionController@getDelete')->name('deleteSale');
	});
	Route::group(['prefix' => 'food'], function()
	{
		Route::get('list', 'FoodController@getList')->name('listFood');
		Route::get('add', 'FoodController@getAdd')->name('addFood');
		Route::post('add', 'FoodController@postAdd');
		Route::get('edit/{id}', 'FoodController@getEdit')->name('editFood');
		Route::post('edit/{id}', 'FoodController@postEdit');
		Route::get('delete/{id}', 'FoodController@getDelete')->name('deleteFood');
		Route::group(['prefix' => 'image'], function()
		{
			Route::get('list/{id}', 'FoodImageController@getList')->name('listImage');
			Route::get('add/{id}', 'FoodImageController@getAdd')->name('addImage');
			Route::post('add/{id}', 'FoodImageController@postAdd');
			Route::get('delete/{id}', 'FoodImageController@getDelete')->name('deleteImage');
		});
	});
	Route::group(['prefix' => 'user'], function()
	{
	    Route::get('list', 'UserController@getList')->name('listUser');
	    Route::get('add', 'UserController@getAdd')->name('addUser');
	    Route::post('add', 'UserController@postAdd');
	    Route::get('edit/{id}', 'UserController@getEdit')->name('editUser');
	    Route::post('edit/{id}', 'UserController@postEdit');
	    Route::get('delete/{id}', 'UserController@getDelete')->name('deleteUser');
	});
	Route::group(['prefix' => 'banner'], function()
	{
	    Route::get('list', 'BannerController@getList')->name('listBanner');
	    Route::get('add', 'BannerController@getAdd')->name('addBanner');
	    Route::post('add', 'BannerController@postAdd');
	    Route::get('edit/{id}', 'BannerController@getEdit')->name('editBanner');
	    Route::post('edit/{id}', 'BannerController@postEdit');
	    Route::get('delete/{id}', 'BannerController@getDelete')->name('deleteBanner');
	});
	Route::group(['prefix' => 'commentFood'], function()
	{
		Route::get('list/{id}', 'CommentController@getListFood')->name('listCommentFood');
	});
	Route::group(['prefix' => 'commentNews'], function()
	{
		Route::get('list/{id}', 'CommentController@getListNews')->name('listCommentNews');
	});
	Route::group(['prefix' => 'order'], function()
	{
		Route::get('list', 'OrderController@getList')->name('listOrder');
		Route::get('list/{id}', 'OrderController@getListDetail')->name('listDetail');
		Route::get('edit/{id}', 'OrderController@getEdit')->name('editOrder');
	    Route::post('edit/{id}', 'OrderController@postEdit');
		Route::get('delete/{id}', 'OrderController@getDelete')->name('deleteOrder');
	});
	Route::group(['prefix' => 'news'], function()
	{
	    Route::get('list', 'NewsController@getList')->name('listNews');
	    Route::get('add', 'NewsController@getAdd')->name('addNews');
	    Route::post('add', 'NewsController@postAdd');
	    Route::get('edit/{id}', 'NewsController@getEdit')->name('editNews');
	    Route::post('edit/{id}', 'NewsController@postEdit');
	    Route::get('delete/{id}', 'NewsController@getDelete')->name('deleteNews');
	});
});
Route::get('home', 'PageController@getHome')->name('home');
Route::get('login', 'PageController@getLogin')->name('login');
Route::post('login', 'PageController@postLogin');
Route::get('logout', 'PageController@getLogout')->name('logout');
Route::get('signup', 'PageController@getSignup')->name('signup');
Route::post('signup', 'PageController@postSignup');
Route::get('food/{id}', 'PageController@food')->name('food');
Route::post('commentFood/{id}', 'CommentController@postCommentFood')->name('commentFood');
Route::post('commentNews/{id}', 'CommentController@postCommentNews')->name('commentNews');
Route::get('category/{id}', 'PageController@category')->name('category');
Route::group(['prefix' => 'cart'], function()
{
	Route::post('add/{id}', 'CartController@addCart')->name('addCart');
	Route::get('list', 'CartController@listCart')->name('listCart');
	Route::get('delete/{id}', 'CartController@deleteCart')->name('deleteCart');
	Route::get('update', 'CartController@updateCart');
});
Route::get('search', 'PageController@getSearch')->name('search');
Route::get('order', 'PageController@getOrder')->name('order');
Route::post('order', 'PageController@postOrder');
Route::get('user', 'PageController@getUser')->name('user');
Route::post('user', 'PageController@postUser');
Route::get('oldCart/{id}', 'PageController@getListOldCart')->name('oldCart');
Route::get('complete', 'PageController@getComplete')->name('complete');
Route::get('news', 'PageController@getNews')->name('news');
Route::get('news-detail/{id}', 'PageController@getNewsDetail')->name('newsDetail');
Route::post('post', 'PageController@postNews')->name('postNews');
Route::get('redirect/{social}', 'SocialAuthController@redirect')->name('loginFB');
Route::get('callback/{social}', 'SocialAuthController@callback');
