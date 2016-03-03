<?php

// scrapes the SMS and splits into sender, service, and query
$msg = explode(" ", $_REQUEST["Body"], 3);
$sendto = "+1".$msg[0];
$service = strtolower($msg[1]);
$query = $msg[2];
$query = str_replace(" ", "%20", $query);

if ($service == "twitter") {
	include 'twitter.php';
} else if ($service == "nytimes") {
	include 'nytimes.php';
} else if ($service == "youtube") {
	include 'youtube.php';
}
?>
