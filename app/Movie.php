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


    /**
     * Insert actor of the movieid with their character name
     * @param  [type] $movie_id   [id of the movie]
     */
    public static function deleteActorMovieRelationship($movie_id){
    	try {

            DB::table('movies_rel_actors')->where('movie_id', '=', $movie_id)->delete();

		} catch (Exception $e){
    		$returnData = array(
			    'status' => 'error',
			    'message' => $e->getMessage()
			);
			echo \Response::json($returnData, 500);
			die();
    	}
    }
    /**
     * Insert actor of the movieid with their character name
     * @param  [type] $movie_id   [id of the movie]
     * @param  [type] $actor_id   [the id of th actor]
     * @param  [type] $actor_name [the character name of the actor in the movie]
     */
    public static function insertActorMovieRelationship($movie_id,$actor_id,$actor_name){
    	try {
			DB::table('movies_rel_actors')->insert(
			    ['movie_id' => $movie_id, 'actor_id' => $actor_id, 'actor_name' => $actor_name]
			);
		} catch (Exception $e){
    		$returnData = array(
			    'status' => 'error',
			    'message' => $e->getMessage()
			);
			echo \Response::json($returnData, 500);
			die();
    	}
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
