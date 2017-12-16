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
		$this->runTest2($path,$method);
	}
    public function runTest($path,$method){
    	//get the token from the database to test with
    	$userDetails = DB::table('users')->get();
    	$token = $userDetails[0]->api_token;
		// $login = 'login';
		// $password = 'password';
		$url = config('app.url').'/api/v1/'.$path;
		$ch = curl_init();


		if ($method == 'post'){
			curl_setopt($ch, CURLOPT_POST, 1);
		} else if ($method == 'patch'){
			curl_setopt($ch, CURLOPT_PATCH, 1);
		} else if ($method == 'delete'){
			curl_setopt($ch, CURLOPT_DELETE, 1);
		} else {
			curl_setopt($ch, CURLOPT_HTTPGET, 1);
		}
		

		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		// curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		// curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json',
	    'Authorization: Bearer ' . $token
	    ));

		try {

			$result = curl_exec($ch);

			if(curl_errno($ch)){
			    echo 'Request Error:' . curl_error($ch);
			}
			curl_close($ch);  
			echo($result);
		} catch(Exception $e){
			print_r($e->getMessage());
		}

    }
    public function runTest2($path,$method){
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
