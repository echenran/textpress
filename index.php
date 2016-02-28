<?php

//header("Access-Control-Allow-Origin: http://localhost:9000");


// this line loads the library 

//$sender = $_REQUEST["From"];
$msg = explode(" ", $_REQUEST["Body"], 3);
$sendto = $msg[0];
$service = $msg[1];
$query = $msg[2];


$query = str_replace(" ", "%20", $query);
if (strtolower($service) == "twitter") {
	include 'twitter.php';
} else if (strtolower($service) == "nytimes") {
	include 'nytimes.php';
} else if (strtolower($service) == 'youtube') {
	include 'youtube.php';
}

?>
