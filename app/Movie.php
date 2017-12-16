<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Movie extends Model
{
    public static function getMovies(){
    	$movies = DB::table('movies')->get();
    	return $movies;
    }

    public static function getMovie($id){
    	// 
    	$movie = DB::table('movies')->where('id',$id)->get();
    	// dd('ss');
    	if (isset($movie[0])){
    		$movie[0]->actors = \App\Actor::getActorsFromMovie($id);
    		return $movie;
    	} else {
    		dd('failed');
    		return $this->notFound();
    	}
    	// return $movie;
    	
    	
    }

    	/**
	 * Get the movies that are in a genre
	 * @param  [int] $genreId [The id of the genre]
	 * @return [objlist]          [Returns a list of objects]
	 */
    public static function getMoviesByGenre($genre_id){

    	$movies = DB::table('movies')->where('genre_id',$genre_id)->get();
    	return $movies;
    }

    /** Not found */
    public function notFound(){
    	$response = new stdClass();
    	$response->status = 'Error';
    	$response->message = 'Not Found';
    	return $response;
    }

}
