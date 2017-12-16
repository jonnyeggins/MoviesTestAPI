<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

	public function index(){
		//testMovies
		$path = '/movies';
		$method = 'get';
		$this->runTest($path,$method);
	}
    
    public function runTest($path,$method){
    	//get the token from the database to test with
    	$userDetails = DB::table('users')->get();
    	$token = $userDetails[0]->api_token;
		// $login = 'login';
		// $password = 'password';
		$url = config('app.url').'/api/v1/'.$path;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		  CURLOPT_URL => $url,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => strtoupper($method),
		  CURLOPT_HTTPHEADER => array(
		    "authorization: Bearer ".$token."",
		    "cache-control: no-cache"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  echo $response;
		}
    }
}
