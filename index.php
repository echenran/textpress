<?php
// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 

//$sender = $_REQUEST["From"];
$msg = explode(" ", $_REQUEST["Body"], 3);
$sendto = $msg[0];
$service = $msg[1];
$query = $msg[2];

$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 

if (strtolower($service) == "twitter") {
	include 'twitter.php';
} else if (strtolower($service) == "nytimes") {
	include 'nytimes.php';
} else {
		$client->account->messages->create(array(
			'To' => $sendto,
			'From' => "+16463744020",
			'Body' => $query,
		));
	}
?>
