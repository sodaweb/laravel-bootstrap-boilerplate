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

// Home
Route::get('/', ['as' => 'home.index', 'uses' => 'HomeController@index']);

Route::get('/mailable', function () {
	$data['name'] = "Nome Sobrenome";
	$data['phone'] = "(12) 34567-8901";
	$data['email'] = "email@address987.com";
	$data['message'] = "Lorem ipsum dolor sit amet\nconsectetur adipisicing elit sed do eiusmod tempor\nincididunt ut labore et dolore magna aliqua.";
    return new App\Mail\MessageReceived($data);
});

// Pages
Route::get('/about', ['as' => 'pages.about', 'uses' => 'PagesController@about']);
Route::get('/services', ['as' => 'pages.services', 'uses' => 'PagesController@services']);

Route::get('/portfolio', ['as' => 'pages.portfolio', 'uses' => 'PagesController@portfolio']);
Route::get('/portfolio-item', ['as' => 'pages.portfolioitem', 'uses' => 'PagesController@portfolioItem']);

Route::get('/news', ['as' => 'pages.news', 'uses' => 'PagesController@news']);
Route::get('/news-item', ['as' => 'pages.newsitem', 'uses' => 'PagesController@newsItem']);

Route::get('/faq', ['as' => 'pages.faq', 'uses' => 'PagesController@faq']);
Route::get('/pricing', ['as' => 'pages.pricing', 'uses' => 'PagesController@pricing']);

// Route::get('/news', ['as' => 'news.index', 'uses' => 'NewsController@index']);
// Route::get('/news-item', ['as' => 'news.show', 'uses' => 'NewsController@show'])


Route::group(['prefix' => 'admin'], function () {
	    // Home
	    Route::get('/', ['as' => 'admin.home.index', 'uses' => 'Admin\HomeController@index']);
	    Route::post('/settings/update', ['as' => 'settings.update', 'uses' => 'Admin\HomeController@updateSettings']);

	    Route::get('/users', ['middleware' => 'user', 'as' => 'admin.users.index', 'uses' => 'Admin\UserController@index']);
	    Route::get('/users/create', ['middleware' => 'user', 'as' => 'admin.users.create', 'uses' => 'Admin\UserController@create']);
	    Route::post('/users/store', ['middleware' => 'user', 'as' => 'admin.users.store', 'uses' => 'Admin\UserController@store']);
	    Route::get('/users/show/{id}', ['middleware' => 'user', 'as' => 'admin.users.show', 'uses' => 'Admin\UserController@show']);
	    Route::get('/users/edit/{id}', ['middleware' => 'user', 'as' => 'admin.users.edit', 'uses' => 'Admin\UserController@edit']);
	    Route::patch('/users/update{id}', ['middleware' => 'user', 'as' => 'admin.users.update', 'uses' => 'Admin\UserController@update']);
	    Route::delete('/users/destroy/{id}', ['middleware' => 'user', 'as' => 'admin.users.destroy', 'uses' => 'Admin\UserController@destroy']);

	    Route::get('/account/password', ['as' => 'account.password', 'uses' => 'Admin\UserController@editPassword']);
		Route::patch('/account/password', ['as' => 'account.password', 'uses' => 'Admin\UserController@updatePassword']);

	    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
		Route::post('/login', 'Auth\LoginController@login');
		Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

		// Registration Routes...
		Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
		Route::post('/register', 'Auth\RegisterController@register');

		// Password Reset Routes...
		Route::get('/senha/resetar', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.new');
		Route::post('/senha/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
		Route::get('/senha/resetar/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
		Route::post('/senha/resetar', 'Auth\ResetPasswordController@reset')->name('password.request');

});

//Authentication
// Authentication routes...
// Route::get('admin/login', ['as' =>'login', 'uses' => 'Auth\AuthController@getLogin']);
// Route::post('admin/login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']);
// Route::get('admin/logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);

// Route::get('admin/account/password', ['as' => 'account.password', 'uses' => 'Admin\UserController@editPassword']);
// Route::patch('admin/account/password', ['as' => 'account.password', 'uses' => 'Admin\UserController@updatePassword']);

// Contact
Route::get('/contato', ['as' => 'contact.index', 'uses' => 'ContactController@index']);
Route::post('/contato', ['as' => 'contact', 'uses' => 'ContactController@contact']);

Route::get('/home', 'HomeController@index')->name('home');
