<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$genres = Genre::getGenres();
    	
    	return $genres;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	//check if the name is not blank
    	if (request('name') == ''){
	    	$returnData = array(
				    'status' => 'error',
				    'message' => 'Name cannot be blank'
			);
			return Response::json($returnData, 500);
		}

		try {
        	Genre::create(request(['name']));

        	$returnData = array(
                'status' => 'success',
                'message' => 'Genre Created';
            );
            return Response::json($returnData, 200);

        } catch (Exception $e){
    		$returnData = array(
			    'status' => 'error',
			    'message' => $e->getMessage()
			);
			return Response::json($returnData, 500);
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
       $genres = DB::table('genres')->where('id',$id)->get();
       return $genres;
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
    	try {
	        $genre = Genre::find($id);
	        //make sure they have a name 
			if (request('name') == ''){
			   	$returnData = array(
				    'status' => 'error',
				    'message' => 'Name cannot be blank'
				);
				return Response::json($returnData, 500);
	        }
	        $genre->name = request('name');
	        $genre->save();
	        $returnData = array(
			    'status' => 'success',
			    'message' => 'Updated Successfully';
			);
			return Response::json($returnData, 200);

    	} catch (Exception $e){
    		$returnData = array(
			    'status' => 'error',
			    'message' => $e->getMessage()
			);
			return Response::json($returnData, 500);
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
	        $genre = Genre::find($id);

        	$genre->delete();

        	$returnData = array(
			    'status' => 'success',
			    'message' => 'Genre Deleted';
			);
			return Response::json($returnData, 200);

    	} catch (Exception $e){
    		$returnData = array(
			    'status' => 'error',
			    'message' => $e->getMessage()
			);
			return Response::json($returnData, 500);
    	}

    }
}
