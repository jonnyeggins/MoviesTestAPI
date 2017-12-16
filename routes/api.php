<?php

use Illuminate\Http\Request;



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1','middleware' => 'auth:api'],	function(){


		//MOVIES
		Route::get('/movies','MoviesController@index');
		Route::post('/movies','MoviesController@store');
		Route::get('/movies/{id}','MoviesController@show');
		Route::patch('/movies/{id}','MoviesController@update');
		Route::delete('/movies/{id}','MoviesController@destroy');
		Route::get('/movies-by-genre/{genre_id}','MoviesController@getMoviesByGenre');


		//ACTORS
		Route::get('/actors','ActorsController@index');
		Route::post('/actors','ActorsController@store');
		Route::get('/actors/{id}','ActorsController@show');
		Route::patch('/actors/{id}','ActorsController@update');
		Route::delete('/actors/{id}','ActorsController@destroy');
		Route::get('/actors-by-genre/{genre_id}','ActorsController@getActorsByGenre');
		
		//GENRES
		Route::get('/genres','GenresController@index');
		Route::post('/genres','GenresController@store');
		Route::get('/genres/{id}','GenresController@show');
		Route::patch('/genres/{id}','GenresController@update');
		Route::delete('/genres/{id}','GenresController@destroy');
		
		Route::post('/uploadActorImage',function(){
			//upload the image to s3
			//$file = request()->file('avatar');
			//$file->storeAs('actors/'.auth()->id.'actor.jpg');

		});

		
});

Route::get('/closure',function () {
    dd('fail');
});
