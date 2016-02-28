<?php 

require('vendor/twilio/sdk/Services/Twilio.php'); 
require('TwitterAPIExchange.php');

$q = "obama";
$service_url = 'http://api.nytimes.com/svc/search/v2/articlesearch.json?q='.$q.'&fq=headline%3A+'.$q.'&sort=newest&facet_field=section_name&facet_filter=true&api-key=4e51aa8bcd9d88eedb9f23c23b67d9c0:2:74566106';

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
$items = $decoded[response][docs];
echo '<pre>'; print_r($items); echo '</pre>';
$toField = "+15083530126";
$account_sid = 'AC5ddfda7909b9b25c06d3dbdc2dbe5a75'; 
$auth_token = 'b0d3d3844073b78843bad5647831cdb7'; 
$client = new Services_Twilio($account_sid, $auth_token); 
$client->account->messages->create(array( 
	'To' => $toField, 
	'From' => "+16463744020", 
	'Body' => "NY Time Article: ".$items[0]['headline']['main'].": ".$items['headline']['print_headline']" ".$items[0]['web_url'], 
	));

	?>
