<?php

// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 

$service_url = "https://www.googleapis.com/youtube/v3/search?q=".$query."&key=AIzaSyByfyNLAIY3V-KXdfkpUb5bbPQF7B3Qon4&part=snippet";

$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
	$info = curl_getinfo($curl);
	curl_close($curl);
	die('error occured during curl exec. Additioanl info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response, true);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
	die('error occured: ' . $decoded->response->errormessage);
}
echo '<pre>'; print_r($decoded); echo '</pre>';
/*
$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 
foreach($string as $items)
{
	$client->account->messages->create(array( 
		'To' => $sendto, 
		'From' => "+16463744020", 
		'Body' => "Tweet from ".$items['user'].": ".$items['text'], 
	));
}
*/

?>
