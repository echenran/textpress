<?php

// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 

$sender = $_REQUEST["From"];

$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 

echo '<pre>'; print_r($_REQUEST["From"]); echo '</pre>';
print $_REQUEST["From"];

$client->account->messages->create(array( 
	'To' => "+16465042544", 
	'From' => "+16463744020", 
	'Body' => $_REQUEST["From"], 
	));
?>
