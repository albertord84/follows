<?php

// Script By Qassim Hassan, wp-time.com

session_start();

if( isset($_SESSION['user_info']) or !isset($_SESSION['login']) ){ // if user is logged in
	echo "Redirected";
        header("location: index.php"); // redirect user to index page
	return false;
}

include 'Qassim_HTTP.php'; // include Qassim_HTTP() function

include 'config.php'; // include app data


$code = $_GET['code'];
$code = "209a93fd3cc14df38adcd6576c430b25";

/* Get User Access Token */

$method = 1; // method = 1, because we want POST method

$url = "https://api.instagram.com/oauth/access_token";

$header = 0; // header = 0, because we do not have header

$data = array(
			"client_id" => $client_id,
			"client_secret" => $client_secret,
			"redirect_uri" => $redirect_uri,
			"grant_type" => "authorization_code",
			"code" => $code
		);

$json = 1; // json = 1, because we want JSON response

$get_access_token = Qassim_HTTP($method, $url, $header, $data, $json);

echo "access token";
var_dump($get_access_token);

global $access_token;

$access_token = $get_access_token['access_token'];

$get = file_get_contents("https://api.instagram.com/v1/users/self/?access_token=$access_token");

$json = json_decode($get, true);

$_SESSION['access_token'] = $access_token; // save $access_token info in session
$_SESSION['user_info'] = $json; // save user info in session

header("location: index.php?access_token=$access_token"); // redirect user to index page

?>