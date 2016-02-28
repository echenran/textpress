<?php

// this line loads the library 
require('TwitterAPIExchange.php');
require('vendor/twilio/sdk/Services/Twilio.php'); 
$settings = array(
	'oauth_access_token' => "703981800029294592-vwb34kOaty1TTi7QAJvnSlzcUa0WhH8",
	'oauth_access_token_secret' => "Lr7KMMp12F1HJbkCuPZbibsC6ynKzWQbKGYpZG8mTSQTs",
	'consumer_key' => "59ZZ8yb5xvmZpC55OhozC5fFj",
	'consumer_secret' => "hGTRsYpFthtfT5d0tpZo96zygoVCkyGA1aX0RLtpUThiOIpW7F"
	);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = $query;}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
echo '<pre>'; print_r($string); echo '</pre>';
$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 
foreach($string as $items)
{
	$client->account->messages->create(array( 
		'To' => $sendto, 
		'From' => "+16463744020", 
		'Body' => "Tweet from ".$items['user']['name'].": ".$items['text'], 
	));
}

?>
