<?php

//loads the library
require('vendor/twilio/sdk/Services/Twilio.php'); 

// scrapes the SMS and splits into sender, service, and query
$msg = explode(" ", $_REQUEST["Body"], 3);
$sendto = "+1".$msg[0];
$service = strtolower($msg[1]);
$query = $msg[2];
$query = str_replace(" ", "%20", $query);
$sender = $_REQUEST["From"];

//sets up auth token
$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token);

if ($service == "twitter") {
	include 'twitter.php';
} else if ($service == "nytimes") {
	include 'nytimes.php';
} else if ($service == "youtube") {
	include 'youtube.php';
} else {
		//sends return text to sender and alerts of invalid form
		$client->account->messages->create(array(                                          
		  'To' => $sender,
			'From' => "+16463744020",
			'Body' => "Invalid request. Try again!",
		));
}
?>
