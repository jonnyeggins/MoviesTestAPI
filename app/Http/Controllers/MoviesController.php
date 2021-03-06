<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getMoviesByGenre($genre_id)
    {
        return Movie::getMoviesByGenre($genre_id);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Movie::getMovies();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //check to make sure they have a name
        if (request('name') == ''){
            $returnData = array(
                'status' => 'error',
                'message' => 'Make sure all fields are filled in correcly'
            );
            return \Response::json($returnData, 500);

        }
        try {
            $movie_id = request('id');
            $actors = request('actors');
            foreach ($actors as $actor){
                Movie::insertActorMovieRelationship($movie_id,$actor->id,$actor->character);
            }
            Movie::create(request(['name','genre','description','rating']));

            $returnData = array(
                'status' => 'success',
                'message' => 'Movie Created'
            );
            return \Response::json($returnData, 200);

        } catch (Exception $e){
            $returnData = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );
            return \Response::json($returnData, 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         return Movie::getMovie($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //check to make sure they have a name
        if (request('name') == ''){
            $returnData = array(
                'status' => 'error',
                'message' => 'Make sure all fields are filled in correctly'
            );
            return \Response::json($returnData, 500);

        }

        try {
            $movie = Movie::find($id);

            //delete all the movie/actor relationships 
            Movie::deleteActorMovieRelationship($id);
            //add in all the relationships again
            $actors = request('actors');
            foreach ($actors as $actor){
                Movie::insertActorMovieRelationship($id,$actor->id,$actor->character);
            }

            $movie->name = request('name');
            $movie->genre_id = request('genre_id');
            $movie->rating = request('rating');
            $movie->description = request('description');
            $movie->image = request('image');

            //update the movie details
            $movie->save();
            $returnData = array(
                'status' => 'success',
                'message' => 'Updated Successfully'
            );
            return \Response::json($returnData, 200);

        } catch (Exception $e){
            $returnData = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );
            return \Response::json($returnData, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            $movie = Movie::find($id);

            $movie->delete();

            $returnData = array(
                'status' => 'success',
                'message' => 'Movie Deleted'
            );
            return \Response::json($returnData, 200);

        } catch (Exception $e){
            $returnData = array(
                'status' => 'error',
                'message' => $e->getMessage()
            );
            return \Response::json($returnData, 500);
        }
    }
}
