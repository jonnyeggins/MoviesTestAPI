<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Genre extends Model
{
	
     /**
     * Get a obj list of all the genres
     * @return [objlist] [list of all the genres in the database]
     */
    public static function getGenres(){
    	$genres = DB::table('genres')->get();
    	return $genres;
    }
}
