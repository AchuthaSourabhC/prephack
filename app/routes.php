<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'ProblemController@index');

Route::get('login', 'UserController@create');

Route::post('login', 'UserController@login');

Route::post('register', 'UserController@store');

Route::get('logout', 'UserController@logout');

Route::get('problem', 'ProblemController@index');

Route::get('problem/view/{id}', 'ProblemController@show');

Route::get('problem/search', function(){
	return Redirect::to('/');
});

Route::post('problem/search', 'ProblemController@search');

Route::group(array('before' => 'auth'), function()
{

	Route::get('problem/add', 'ProblemController@create');

	Route::post('problem/add', 'ProblemController@store');

	Route::get('problem/edit/{id}', 'ProblemController@edit');

	Route::post('problem/edit/{id}', 'ProblemController@update');

	Route::get('profile/{name}', 'UserController@show');

	Route::get('user/follow/{id}', 'FollowerController@follow');

});