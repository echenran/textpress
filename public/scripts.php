<?php
	
	$sendto = echo $_GET['sendto'];
	$query = echo $_GET['query'];

	if($_POST['submit'] && $_POST['submit'] != 0)
	{
	   $service=$_POST['servicedd'];
	}

// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 

$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 

if ($service) == "twitter") {
	include '../twitter.php';
} else if ($service) == "nytimes") {
	include '../nytimes.php';
} else if ($service) == "youtube") {
	include '../youtube.php';
} else {
		$client->account->messages->create(array(
			'To' => $sendto,
			'From' => "+16463744020",
			'Body' => $query,
		));
	}
?>
