<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Actor extends Model
{
	/**
	 * Get the actors that are in movies of a genre
	 * @param  [int] $genreId [The id of the genre]
	 * @return [objlist]          [Returns a list of objects]
	 */
    public static function getActorsInGenre($genre_id){

        $actors = DB::table('movies') 
            ->join('movies_rel_actors','movies.id','=','movies_rel_actors.movie_id')   
            ->join('actors','movies_rel_actors.actor_id','=','actors.id')
            ->where('movies.genre_id','=',$genre_id)
            ->get();
    	return $actors;
    }


    /**
     * Get a obj list of all the actors
     * @return [objlist] [list of all the actors in the database]
     */
    public static function getActors(){
        $actors = DB::table('actors')->get();
        return $actors;
    }

    /**
     * Get the actor details
     * @return [objlist] [list of all the actors in the database]
     */
    public static function getActor($id){
    	$actor = DB::table('actors')->where('id',$id)->get();
    	return $actor;
    }

    
    /**
     * Get a actors from a movie
     * @return [objlist] [list of all the actors in the database]
     */
    public static function getActorsFromMovie($movie_id){
    	$actors = DB::table('movies_rel_actors')
            ->join('actors','movies_rel_actors.actor_id','=','actors.id')
            ->where('movies_rel_actors.movie_id','=',$movie_id)
            ->get();
    	return $actors;
    }



    
}
