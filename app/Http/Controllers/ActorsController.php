<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actor;

class ActorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getActorsByGenre($genre_id)
    {
        return Actor::getActorsInGenre($genre_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return Actor::getActors();
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
        	Actor::create(request(['name','birth_date','age','bio','image']));

        	$returnData = array(
                'status' => 'success',
                'message' => 'Actor Created'
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
         return Actor::getActor($id);
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
			    'message' => 'Make sure all fields are filled in correcly'
			);
			return \Response::json($returnData, 500);

		}
		try {
	        $actor = Actor::find($id);

	        $actor->name = request('name');
	        $actor->birth_date = request('birth_date');
	        $actor->age = request('age');
	        $actor->bio = request('bio');
	        $actor->image = request('image');
	        $actor->save();

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
            $actor = Actor::find($id);

            $actor->delete();

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
