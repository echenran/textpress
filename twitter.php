<?php

// this line loads the library 
require('vendor/twilio/sdk/Services/Twilio.php'); 
require('TwitterAPIExchange.php');

$settings = array(
	'oauth_access_token' => "703981800029294592-vwb34kOaty1TTi7QAJvnSlzcUa0WhH8",
	'oauth_access_token_secret' => "Lr7KMMp12F1HJbkCuPZbibsC6ynKzWQbKGYpZG8mTSQTs",
	'consumer_key' => "59ZZ8yb5xvmZpC55OhozC5fFj",
	'consumer_secret' => "hGTRsYpFthtfT5d0tpZo96zygoVCkyGA1aX0RLtpUThiOIpW7F"
	);

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";
$requestMethod = "GET";
if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = "iagdotme";}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 1;}
$getfield = "?screen_name=$user&count=$count";
$twitter = new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
	->buildOauth($url, $requestMethod)
	->performRequest(),$assoc = TRUE);
if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}
foreach($string as $items)
{
	echo "Time and Date of Tweet: ".$items['created_at']."<br />";
	echo "Tweet: ". $items['text']."<br />";
	echo "Tweeted by: ". $items['user']['name']."<br />";
	echo "Screen name: ". $items['user']['screen_name']."<br />";
	echo "Followers: ". $items['user']['followers_count']."<br />";
	echo "Friends: ". $items['user']['friends_count']."<br />";
	echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
}?>
