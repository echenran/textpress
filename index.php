<?php
//header("Access-Control-Allow-Origin: http://localhost:9000");

// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 

$sender = $_REQUEST["From"];
msg($sendto, $service, $query) = split(" ", $_REQUEST["Body"]), 3)

$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 

$client->account->messages->create(array( 
	'To' => "+16465042544", 
	'From' => "+16463744020", 
	'Body' => $_REQUEST["From"], 
	));
?>
